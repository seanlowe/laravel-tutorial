<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create() {
        return view('registration.create');
    }

    public function store() {
        // validate
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // create and save
        $user = User::create([
            // request(['name', 'email', 'password'])
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        // sign them in
        auth()->login($user);

        // redirect
        return redirect()->home();
    }
}
