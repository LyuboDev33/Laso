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

    /** Show the privacy */
    public function privacy (){
        return view('Frontend.legal.privacy');
    }

    /** Show the cookies */
    public function cookies (){
        return view('Frontend.legal.cookies');
    }

    /** Show the terms */
    public function terms (){
        return view('Frontend.legal.terms-and-conditions');
    }

    /** Show the processing */
    public function processing () {
        return view('Frontend.legal.processing-personal-data');
    }

}
