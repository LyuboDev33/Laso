<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserAdsRequest;
use App\Mail\MaterialsCompletedMail;
use App\Models\User;
use App\Models\UserAd;
use App\Services\StripeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserAdsController extends Controller
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
     * Show all ads belonging to the authenticated user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        $ads = UserAd::where('user_id', $user->id)
            ->latest()
            ->paginate(10);

        $subscription = $user->subscriptions()
            ->where('stripe_status', 'active')
            ->latest()
            ->first();

        $adLimit = 0;

        if ($subscription) {
            $adLimit = $this->stripeService->getPlanAdLimit($subscription->type);
        }

        $adsCount = UserAd::where('user_id', $user->id)->count();

        $availableAds = max(0, $adLimit - $adsCount);

        return view('Backend.ads.ads', [
            'ads' => $ads,
            'adLimit' => $adLimit,
            'adsCount' => $adsCount,
            'availableAds' => $availableAds,
        ]);
    }

    /**
     * Show a single ad belonging to the authenticated user.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $user = Auth::user();

        $details = UserAd::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        return view('Backend.ads.show', [
            'user' => $user,
            'details' => $details,
        ]);
    }

    /** Create an ad view */
    public function createAd()
    {
        $user = Auth::user();

        $subscription = $user->subscriptions()
            ->where('stripe_status', 'active')
            ->latest()
            ->first();

        $adLimit = 0;

        if ($subscription) {
            $adLimit = $this->stripeService->getPlanAdLimit(
                $subscription->type
            );
        }

        $adsCount = UserAd::where('user_id', $user->id)->count();

        $availableAds = max(0, $adLimit - $adsCount);

        $canCreateAd = $adsCount < $adLimit;

        return view('Backend.ads.create', [
            'adLimit' => $adLimit,
            'adsCount' => $adsCount,
            'availableAds' => $availableAds,
            'canCreateAd' => $canCreateAd,
        ]);
    }

    /**
     * Create a new ad for the authenticated user.
     *
     * The amount of ads the user can create depends
     * on their currently active subscription plan.
     *
     * @param CreateUserAdsRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function createUserAd(CreateUserAdsRequest $request, User $user): RedirectResponse
    {

        $validated = $request->validated();

        $user = Auth::user();

        $subscription = $user->subscriptions()
            ->where('stripe_status', 'active')
            ->latest()
            ->first();

        if (!$subscription) {
            return back()->with(
                'error',
                'Нямате активен абонаментен план.'
            );
        }

        $adLimit = $this->stripeService->getPlanAdLimit($subscription->type);

        if ($adLimit === 0) {
            return back()->with('error', 'Не успяхме да определим лимита за вашия абонаментен план.');
        }

        $currentAdsCount = UserAd::where('user_id', $user->id)->count();

        if ($currentAdsCount >= $adLimit) {
            return back()->with('error', 'Достигнали сте максималния брой реклами за вашия абонаментен план.');
        }


        $logoFilename = null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoFilename = time() . '_' . uniqid() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('assets/img/dashboard/business_logo'), $logoFilename);
        }


        $imageFilenames = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/img/dashboard/business_images'), $filename);
                $imageFilenames[] = $filename;
            }
        }


        $videoFilenames = [];

        if ($request->hasFile('videos')) {

            foreach ($request->file('videos') as $video) {
                $filename = time() . '_' . uniqid() . '_' . $video->getClientOriginalName();
                $video->move(public_path('assets/img/dashboard/business_video'), $filename);

                $videoFilenames[] = $filename;
            }
        }

        $audioFilename = null;

        if ($request->hasFile('voice_recording')) {
            $audio = $request->file('voice_recording');
            $audioFilename = time() . '_' . uniqid() . '_' . $audio->getClientOriginalName();
            $audio->move(public_path('assets/img/dashboard/business_audio'), $audioFilename);
        }

        try {

            UserAd::create([
                'user_id' => $user->id,
                'company_name' => $validated['company_name'],
                'business_description' => $validated['business_description'],
                'website' => $validated['website'] ?? null,
                'city' => $validated['city'],
                'phone' => $validated['phone'],
                'brand_information' => $validated['brand_information'] ?? null,
                'logo' => $logoFilename,
                'images' => !empty($imageFilenames) ? $imageFilenames : null,
                'videos' => !empty($videoFilenames) ? $videoFilenames : null,
                'voice_recording' => $audioFilename,
                'video_ad_requirements' => $validated['video_ad_requirements'] ?? null,
                'additional_notes' => $validated['additional_notes'] ?? null,
            ]);


            Mail::to('teodor.teodosiev9004@gmail.com')->send(new MaterialsCompletedMail($user));
        } catch (\Throwable $e) {

            report($e);

            return back()->with('error', 'Възникна грешка при създаването на рекламата.');
        }


        return back()->redirect(route('ads.index'))->with('success', 'Информацията за рекламата беше изпратена успешно.');
    }
}
