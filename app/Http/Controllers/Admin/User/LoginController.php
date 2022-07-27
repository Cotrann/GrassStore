<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Services\RegisterService;
use App\Http\Requests\RegisterRequest;

class LoginController extends Controller
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }
    public function index()
    {
        return view('login',[
            'title' => 'Đăng nhập hệ thống'
        ]);
    }


    public function store(Request $request)
    {
        $this -> validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request -> input('email'),
            'password' => $request -> input('password')
        ], $request -> input('remember'))) {
            return redirect('/profile');
        }

        Session::flash('error', 'Incorrect Email or Password');

        return redirect() -> back();
    }

    public function register(RegisterRequest $registerRequest)
    {
        if ($registerRequest->password != $registerRequest->password_again) {
            Session::flash('error', 'Mật khẩu không khớp');
            return redirect() -> back();
        } else {
            $result = $this->registerService->create($registerRequest);
            return redirect('/');
        }

    }

}
