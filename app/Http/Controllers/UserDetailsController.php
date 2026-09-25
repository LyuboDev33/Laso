<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserDetailsRequest;
use App\Mail\MaterialsCompletedMail;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class UserDetailsController extends Controller
{


    /**
     * Create or update the authenticated user's business details.
     *
     * @param CreateUserDetailsRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function createUserDetails(CreateUserDetailsRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        $user = Auth::user();

        $existingDetails = UserDetail::where('user_id', $user->id)->first();

        $isFirstSubmission = !$existingDetails;


        $logoFilename = $existingDetails?->logo;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');

            $logoFilename = time() . '_' . $logo->getClientOriginalName();

            $logo->move(
                public_path('assets/img/dashboard/business_logo'),
                $logoFilename
            );
        }


        $imageFilenames = $existingDetails?->images ?? [];

        if ($request->hasFile('images')) {
            $imageFilenames = [];

            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();

                $image->move(
                    public_path('assets/img/dashboard/business_images'),
                    $filename
                );

                $imageFilenames[] = $filename;
            }
        }


        $videoFilenames = $existingDetails?->videos ?? [];

        if ($request->hasFile('videos')) {
            $videoFilenames = [];

            foreach ($request->file('videos') as $video) {
                $filename = time() . '_' . uniqid() . '_' . $video->getClientOriginalName();

                $video->move(
                    public_path('assets/img/dashboard/business_video'),
                    $filename
                );

                $videoFilenames[] = $filename;
            }
        }


        $audioFilename = $existingDetails?->voice_recording;

        if ($request->hasFile('voice_recording')) {
            $audio = $request->file('voice_recording');

            $audioFilename = time() . '_' . $audio->getClientOriginalName();

            $audio->move(
                public_path('assets/img/dashboard/business_audio'),
                $audioFilename
            );
        }


        try {

            UserDetail::updateOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'company_name'          => $validated['company_name'],
                    'business_description'  => $validated['business_description'],
                    'website'               => $validated['website'] ?? null,
                    'city'                  => $validated['city'],
                    'phone'                 => $validated['phone'],
                    'brand_information'     => $validated['brand_information'] ?? null,
                    'logo'                  => $logoFilename,
                    'images'                => !empty($imageFilenames) ? $imageFilenames : null,
                    'videos'                => !empty($videoFilenames) ? $videoFilenames : null,
                    'voice_recording'       => $audioFilename,
                    'video_ad_requirements' => $validated['video_ad_requirements'] ?? null,
                    'additional_notes'      => $validated['additional_notes'] ?? null,
                ]
            );


            if ($isFirstSubmission) {
                Mail::to('contact@lubodev.com')->send(new MaterialsCompletedMail($user));
            }
        } catch (\Throwable $e) {

            dd([
                'message' => $e->getMessage()
            ]);
        }


        return back()->with(
            'success',
            $isFirstSubmission
                ? 'Информацията за бизнеса беше запазена успешно.'
                : 'Информацията за бизнеса беше обновена успешно.'
        );
    }
}
