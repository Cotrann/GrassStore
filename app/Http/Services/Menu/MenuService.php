<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class MenuService
{

    public function getParent()
    {
        return Menu::where ('parent_id', 0) -> get();
    }

    public function getAll(Type $var = null)
    {
        return Menu::orderbyDesc ('id') -> paginate(10);
    }


    public function create($request)
    {
        try {
            Menu::create([
                'name' =>(string) $request->input('name'),
                'parent_id' =>(int) $request->input('parent_id'),
                'description' =>(string) $request->input('description'),
                'content' =>(string) $request->input('content'),
                'active' =>(string) $request->input('active')
            ]);

            Session::flash('success', 'Tạo Danh Mục Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $request->input('id'))->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }

    public function update($menu, $request)
    {
        if( $request->input('parent_id') != $menu->id) {
            $menu->parent_id = (int)$request->input('parent_id');
        }
        $menu->name = (string)$request->input('name');
        $menu->description = (string)$request->input('description');
        $menu->content = (string)$request->input('content');
        $menu->active = (string)$request->input('active');
        $menu->save();

        Session::flash('success', 'Cập Nhật Danh Mục Thành Công');
        return true;
    }


    public function show()
    {
        return Menu::select('id', 'name')
        ->where('active', 1)
        ->where('parent_id', 0)
        ->orderByDesc('id')->get();
    }

    public function getById($id)
    {
        return Menu::where('id', $id)
        ->where('active', 1)
        ->firstOrFail();
    }

    public function getProducts($request, $menu)
    {
        $qr = 'active = 1 and ( ';
        foreach($menu as $m) {
            $qr .= 'menu_id = '.$m->id.' or ';
        }

        $query = Product::whereRaw('( '.trim($qr, 'or ').' )'.' )');
        if ($request->input('price')) {
            $query->orderBy('price', $request->input('price'));
        }

        if ($request->input('id')) {
            $query->orderBy('id', $request->input('id'));
        }

        return $query->paginate(12)->withQueryString();
    }

    public function getSubmenu($parent_id)
    {
        return Menu::where('parent_id', $parent_id)
        ->where('active', 1)
        ->get();
    }
}

