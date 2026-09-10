<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserDetailsRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class UserDetailsController extends Controller
{


public function createUserDetails(CreateUserDetailsRequest $request, User $user): RedirectResponse {

    $validated = $request->validated();

    $logoFilename = null;

    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');

        $logoFilename =
            time() . '_' . $logo->getClientOriginalName();

        $logo->move(
            public_path('assets/img/dashboard/business_logo'),
            $logoFilename
        );
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
        $audioFilename = time() . '_' . $audio->getClientOriginalName();
        $audio->move(public_path('assets/img/dashboard/business_audio'), $audioFilename);
    }


 try {

    UserDetail::create([
        'user_id'               => $user->id,
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
    ]);

} catch (\Throwable $e) {

    dd(['message' => $e->getMessage()]);

}

    return back()->with(
        'success',
        'Информацията за бизнеса беше запазена успешно.'
    );
}
}
