<?php

namespace Laraphant\Contactform\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laraphant\Contactform\Mail\InqueryEmail;
use Laraphant\Contactform\Models\Contact;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contactform::create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        Contact::create($validated);

        // ===sending email to admin==
        //->getting email of admin from .env file
        $admin_email = \config('contactform.admin_email');  

        if ($admin_email === null || $admin_email === '') {
            dd('there is an error');
        } else {
            Mail::to($admin_email)->send(new InqueryEmail($validated));
        }
        // ===end of sending email to admin===
        return back();
    }
}
