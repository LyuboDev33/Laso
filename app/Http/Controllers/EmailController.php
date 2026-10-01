<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     *
     * @param Request
     * @return RedirectResponse
     */
    public function contactForm(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Mail::to('teodor.teodosiev9004@gmail.com')->send(new ContactFormMail($validated));

        return back()->with('messageSent', 'Съобщението беше изпратено успешно! Очаквайте свръзване от нас!');
    }
}
