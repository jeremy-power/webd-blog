<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
        // // Validate the form
        // $this->validate(request(), [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed'
        // // ]);
        // // Create and save the user.
        // $user = User::create(
        //     ['name' => request('name'),
        //      'email'=> request('email'),
        //     'password' => bcrypt(request('password'))
        //     ]);

        // // Sign them in.
        // auth()->login($user);
        $request->persist();
        // \Mail::to($user)->send(new Welcome($user));
        // Redirect to home page.
        session()->flash('message', 'Thanks so much for signing up!');

        return redirect()->home();
    }
}
