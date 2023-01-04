<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Models\ContactEmail;
use Illuminate\Http\Request;

class ContactController extends FrontEndController
{
    public function index()
    {
        $this->AddToLog('Went to contact page');
        return view('pages.main.contact',['data' => $this->data]);
    }
    public function store(SendEmailRequest $request)
    {
        try {
            $mail = new ContactEmail();
            $mail->name = $request->name;
            $mail->email = $request->email;
            $mail->subject = $request->subject;
            $mail->message = $request->message;

            $mail->save();
            $this->AddToLog('Sent email');
            return redirect()->back()->with('success-msg', "Successfully added a nav item!");

        }
        catch (\Exception $e) {
            $userTicket = uuid_create();
            Log::error($userTicket . " " . $e->getMessage());
            return  redirect()->back()->with("error", "An error has occurred, please contact support with this ticket number " . $userTicket);
        }
    }
}
