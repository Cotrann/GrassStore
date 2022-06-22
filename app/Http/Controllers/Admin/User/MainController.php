<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.store', [
            'title' => 'Quản lý cửa hàng'
        ]);
    }
}
