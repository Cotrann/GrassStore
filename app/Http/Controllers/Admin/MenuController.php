<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;


class MenuController extends Controller
{

    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh Mục Mới',
            'menu' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->menuService->create($request);

        return redirect()->back();
    }

    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->menuService->update($menu, $request);

        return redirect(url('admin/menu/list'));
    }

    public function index()
    {
        return view('admin.menu.list',[
            'title'=>'Danh Sách Danh Mục Mới Nhất',
            'menu'=>$this->menuService->getAll()
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Deleted'
            ]);
        }

        return response()->json([
            'error' => true,
        ]);

    }

    public function show(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh Sửa Danh Mục '.$menu->name,
            'menu' => $menu,
            'menu1' => $this->menuService->getParent()
        ]);
    }
}
