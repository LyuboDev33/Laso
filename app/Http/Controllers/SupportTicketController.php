<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Models\User;
use App\Services\StripeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SupportTicketController extends Controller
{
    /**
     * Stripe service.
     *
     * @var StripeService
     */
    private StripeService $stripeService;

    /**
     * Create a new controller instance.
     *
     * @param StripeService $stripeService
     */
    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    /**
     * Get the support ticket availability
     * for the authenticated user.
     *
     * @param User $user
     * @return array
     */
    private function ticketAvailability(User $user): array
    {
        $subscription = $user->subscriptions()
            ->where('stripe_status', 'active')
            ->latest()
            ->first();

        $ticketLimit = 0;

        if ($subscription) {
            $ticketLimit = $this->stripeService->getPlanAdLimit($subscription->type);
        }

        $ticketsCount = SupportTicket::where('user_id', $user->id)->count();

        $availableTickets = max(0, $ticketLimit - $ticketsCount);

        $canCreateTicket = $ticketsCount < $ticketLimit;

        return [
            'ticketLimit' => $ticketLimit,
            'ticketsCount' => $ticketsCount,
            'availableTickets' => $availableTickets,
            'canCreateTicket' => $canCreateTicket,
        ];
    }

    /**
     * Show all support tickets belonging
     * to the authenticated user.
     *
     * @return View
     */
    public function index(): View
    {
        $user = Auth::user();

        $tickets = SupportTicket::where('user_id', $user->id)
            ->latest()
            ->paginate(10);

        return view('Backend.supportTickets.Index', [
            'tickets' => $tickets,
            ...$this->ticketAvailability($user),
        ]);
    }

    /**
     * Show the create support ticket page.
     *
     * @return View
     */
    public function create(): View
    {
        $user = Auth::user();

        return view('Backend.supportTickets.Create', [
            ...$this->ticketAvailability($user),
        ]);
    }

    /**
     * Create a new support ticket.
     *
     * The maximum number of tickets depends
     * on the user's active subscription plan.
     *
     * @param Request $request
     * @return RedirectResponse
     */

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $user = Auth::user();


        $subscription = $user->subscriptions()
            ->where('stripe_status', 'active')
            ->latest()
            ->first();

        if (!$subscription) {
            return back()
                ->withInput()
                ->with('error', 'Нямате активен абонаментен план.');
        }

        $ticketLimit = $this->stripeService->getPlanAdLimit(
            $subscription->type
        );

        if ($ticketLimit === 0) {
            return back()
                ->withInput()
                ->with('error', 'Не успяхме да определим лимита за вашия абонаментен план.');
        }


        $currentTicketsCount = SupportTicket::where('user_id', $user->id)->count();

        if ($currentTicketsCount >= $ticketLimit) {
            return back()
                ->withInput()
                ->with('error', 'Достигнали сте максималния брой заявки за вашия абонаментен план.');
        }


        $filename = null;

        try {
            DB::transaction(function () use ($user, $request, $validated, &$filename) {

                User::whereKey($user->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $availability = $this->ticketAvailability($user);

                if (!$availability['canCreateTicket']) {
                    abort(403, 'Достигнали сте максималния брой заявки.');
                }

                if ($request->hasFile('image')) {
                    $image = $request->file('image');

                    $filename = time() . '_' . uniqid() . '.' . $image->extension();

                    $image->move(public_path('assets/img/dashboard/support'), $filename);
                }

                SupportTicket::create([
                    'user_id' => $user->id,
                    'title' => $validated['title'],
                    'description' => $validated['description'],
                    'image' => $filename,
                ]);
            });
        } catch (\Throwable $e) {

            if ($filename && file_exists(public_path('assets/img/dashboard/support/' . $filename))) {
                unlink(public_path('assets/img/dashboard/support/' . $filename));
            }

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Възникна грешка при създаването на заявката.');
        }

        return redirect()
            ->route('support-ticket.index')
            ->with('success', 'Вашата заявка беше изпратена успешно.');
    }

    /**
     * Show a single support ticket
     * belonging to the authenticated user.
     *
     * @param SupportTicket $supportTicket
     * @return View
     */
    public function show(SupportTicket $supportTicket): View
    {
        $user = Auth::user();

        abort_unless($supportTicket->user_id === $user->id, 403);

        return view('Backend.supportTickets.Show', [
            'ticket' => $supportTicket,
        ]);
    }
}
