<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Services\User\UserAdminService;
use App\Http\Requests\UserRequest;

class MainController extends Controller
{

    protected $userAdminService;

    public function __construct(UserAdminService $userAdminService)
    {
        $this->userAdminService = $userAdminService;
    }

    public function index()
    {
        return view('admin.store', [
            'title' => 'Quản lý cửa hàng'
        ]);
    }

    public function list()
    {
        $user = User::paginate(10);
        return view('admin.user.list', [
            'title' => 'Quản lý người dùng',
            'users' => $user
        ]);
    }

    public function destroy(Request $request)
    {

        $result = $this->userAdminService->delete($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Người dùng'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function show($user)
    {
        $user = User::find($user);
        return view('admin.user.edit', [
            'title' => 'Sửa thông tin Người dùng',
            'user' => $user
        ]);
    }

    public function update(User $user, Request $userRequest)
    {

        $this->validate($userRequest, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $this->userAdminService->update($user, $userRequest);

        return redirect(url('admin/users/list'));
    }


}
