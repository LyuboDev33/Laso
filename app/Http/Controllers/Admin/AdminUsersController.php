<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotifyUserAboutAdLink;
use App\Models\User;
use App\Models\UserAd;
use App\Services\StripeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AdminUsersController extends Controller
{
    /**
     * Inject the Stripe service.
     */
    public function __construct(
        private StripeService $stripeService
    ) {}


    /**
     * Show all users.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $validated = $request->validate([
            'ended_date' => ['nullable', 'date_format:Y-m-d'],
        ]);

        $endedDate = $validated['ended_date'] ?? null;

        $users = User::query()
            ->with('subscriptions')
            ->when($endedDate, function ($query) use ($endedDate) {
                $query->whereHas('subscriptions', function ($subscriptionQuery) use ($endedDate) {
                    $subscriptionQuery
                        ->whereDate('ends_at', $endedDate)
                        ->where('ends_at', '<=', now());
                });
            })
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.Users.Index', [
            'users' => $users,
            'endedDate' => $endedDate,
            'getRelevantSubscription' => fn(User $user) =>
            $this->stripeService->getRelevantSubscription($user),
        ]);
    }


    /**
     * Show a specific user.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function show(User $user): View
    {
        $subscription = $this->stripeService->subscriptionInformation($user);

        return view('admin.Users.Show', [
            'user' => $user,
            'subscription' => $subscription,
        ]);
    }


    /**
     * Show all advertisements belonging to a user.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function userAds(User $user): View
    {
        $ads = UserAd::where('user_id', $user->id)
            ->latest()
            ->paginate(15);

        return view('admin.Users.User', [
            'user' => $user,
            'ads' => $ads,
        ]);
    }


    /**
     * Show one specific advertisement belonging to a user.
     *
     * @param User $user
     * @param UserAd $ad
     * @return \Illuminate\View\View
     */
    public function showDetails(User $user, UserAd $ad): View
    {

        abort_if($ad->user_id !== $user->id, 404);

        return view('admin.Users.Details', [
            'user' => $user,
            'details' => $ad,
        ]);
    }

    /**
     * Update the advertisement link.
     *
     * @param Request $request
     * @param User $user
     * @param UserAd $ad
     * @return RedirectResponse
     */
    public function updateAdLink(Request $request, User $user, UserAd $ad): RedirectResponse
    {
        abort_if($ad->user_id !== $user->id, 404);

        $validated = $request->validate([
            'ad_link' => ['nullable', 'url', 'max:2048'],
        ]);

        $ad->update([
            'ad_link' => $validated['ad_link'] ?? null,
        ]);

        if ($ad->ad_link) {
            Mail::to($user->email)->send(new NotifyUserAboutAdLink($user, $ad));
        }

        return back()->with('success', 'Линкът към рекламата беше запазен успешно.');
    }


    /**
     * Delete an uploaded advertisement material.
     *
     * @param Request $request
     * @param User $user
     * @param UserAd $ad
     * @return RedirectResponse
     */
    public function deleteAdMaterial(Request $request, User $user, UserAd $ad): RedirectResponse {

        $validated = $request->validate([
            'type' => [
                'required',
                'in:logo,images,videos,voice_recording',
            ],
            'filename' => [
                'required',
                'string',
            ],
        ]);

        // Make sure the advertisement belongs to this user.
        if ((int) $ad->user_id !== (int) $user->id) {
            abort(404);
        }

        $type = $validated['type'];
        $filename = $validated['filename'];

        // Never accept a directory from the request.
        $directories = [
            'logo' => 'assets/img/dashboard/business_logo',
            'images' => 'assets/img/dashboard/business_images',
            'videos' => 'assets/img/dashboard/business_video',
            'voice_recording' => 'assets/img/dashboard/business_audio',
        ];

        $directory = $directories[$type];

        try {
            DB::transaction(function () use (
                $ad,
                $type,
                $filename,
                $directory
            ) {

                $ad = UserAd::whereKey($ad->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if (in_array($type, ['images', 'videos'], true)) {

                    $files = $ad->{$type} ?? [];

                    if (is_string($files)) {
                        $files = json_decode($files, true);
                    }

                    if (
                        !is_array($files) ||
                        !in_array($filename, $files, true)
                    ) {

                        throw new \RuntimeException( 'RESOURCE_NOT_FOUND');
                    }
                } else {

                    if ($ad->{$type} !== $filename) {
                        throw new \RuntimeException(
                            'RESOURCE_NOT_FOUND'
                        );
                    }
                }

                // Filenames must never contain path components.
                if (
                    $filename === '' ||
                    $filename === '.' ||
                    $filename === '..' ||
                    basename($filename) !== $filename ||
                    str_contains($filename, '\\')
                ) {
                    throw new \RuntimeException(
                        'INVALID_FILENAME'
                    );
                }

                $baseDirectory = realpath(public_path($directory));

                if ($baseDirectory === false) {
                    throw new \RuntimeException(
                        'FILE_NOT_FOUND'
                    );
                }

                $filePath = $baseDirectory . DIRECTORY_SEPARATOR . $filename;

                // Verify the physical file exists.
                if (!is_file($filePath) || is_link($filePath)) {
                    throw new \RuntimeException(
                        'FILE_NOT_FOUND'
                    );
                }

                // Remove the file from the server.
                if (!unlink($filePath)) {
                    throw new \RuntimeException(
                        'DELETE_FAILED'
                    );
                }

                // Update the database.
                if (in_array($type, ['images', 'videos'], true)) {

                    $remainingFiles = array_values(
                        array_filter( $files, fn($file) => $file !== $filename)
                    );

                    $ad->{$type} = !empty($remainingFiles) ? $remainingFiles: null;
                } else {

                    $ad->{$type} = null;
                }

                $ad->save();
            });
        } catch (\RuntimeException $e) {

            $messages = [
                'RESOURCE_NOT_FOUND' => 'Този ресурс не съществува в рекламата.',
                'FILE_NOT_FOUND' => 'Файлът не съществува на сървъра.',
                'INVALID_FILENAME' => 'Невалидно име на файл.',
                'DELETE_FAILED' => 'Файлът не можа да бъде изтрит.',
            ];

            if (isset($messages[$e->getMessage()])) {
                return back()->with(
                    'error',
                    $messages[$e->getMessage()]
                );
            }

            report($e);

            return back()->with(
                'error',
                'Възникна грешка при изтриването на ресурса.'
            );
        } catch (\Throwable $e) {

            report($e);

            return back()->with(
                'error',
                'Възникна грешка при изтриването на ресурса.'
            );
        }

        return back()->with(
            'success',
            'Ресурсът беше изтрит успешно.'
        );
    }
}
