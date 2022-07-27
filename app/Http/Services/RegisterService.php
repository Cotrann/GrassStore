<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class RegisterService

{
    public function create($registerRequest)
    {
        try {
            User::create([
                'email' =>(string) $registerRequest->input('email'),
                'name' =>(string) $registerRequest->input('name'),
                'phone' =>(string) $registerRequest->input('phone'),
                'password' => bcrypt($registerRequest->input('password')),
            ]);
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

}
