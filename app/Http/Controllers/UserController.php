<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Orders;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $id_user = Auth::user()->id;
        $user = $this->userService->getUserById($id_user);
        $orders = User::find($id_user)->orders;
        //$ords = [];
        foreach($orders as $order)
        {
            $order->items = 0;
            $order->total = 0;
            foreach ($order->products as $product) {
                $order->items += $product->pivot->quantity;
                $order->total += $product->pivot->price;
            }
        }

        return view('profile', [
            'title' => 'Trang cá nhân',
            'user' => $user,
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $userRequest)
    {
        $id_user = Auth::user()->id;
        $user = $this->userService->getUserById($id_user);
        $this->userService->update($user, $userRequest);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'currentpass' => 'required',
            'passnew' => 'required',
            'passnew_again' => 'required'
        ]);
        $id_user = Auth::user()->id;
        $user = $this->userService->getUserById($id_user);
        if (Hash::check($request->input('currentpass'), $user->password)) {
            if ($request->input('passnew') == $request->input('passnew_again')) {
                $this->userService->changePassword($user, $request);
            } else {
                Session::flash('error', 'Mật khẩu mới không khớp');
            }
        } else {
            Session::flash('error', 'Mật khẩu hiện tại không đúng');
        }
        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
