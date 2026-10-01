<?php

namespace App\Http\Controllers;


class FrontEndController extends Controller
{
    /** Show the welcome route */
    public function welcome()
    {
        return view('Frontend.welcome');
    }


    /** Show the welcome route */
    public function about()
    {
        return view('Frontend.about');
    }


    /** Show the welcome route */
    public function contact()
    {
        return view('Frontend.contact');
    }

    /** Show the pricing route */
    public function pricing ()  {
        return view('Frontend.pricing');
    }

    /** Show the testimonials route */
    public function testimonials (){
        return view('Frontend.testimonials');
    }

    /** Show the video testimonials */
    public function videos () {
        return view('Frontend.videos');
    }


}
