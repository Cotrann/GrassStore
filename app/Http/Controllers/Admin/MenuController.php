<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Menu\CreateFormRequest;

class MenuController extends Controller
{
    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh Mục Mới'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        dd($request -> input());
    }
}
