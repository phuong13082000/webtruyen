<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:add|edit|watch|delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:add', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $user = User::with('roles', 'permissions')->get();

        return view('admin.user.index', compact('user'));
    }

    public function create()
    {

        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $user = new User();
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->name = $data['name'];

        $user->save();
        return redirect()->route('user.index')->with('status', 'Thêm user thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function phanquyen($id)
    {
        $user = User::find($id);
        $name_roles = $user->roles->first()->name;
        $permission = Permission::orderBy('id', 'DESC')->get();

        //lay quyen
        $get_permission_via_role = $user->getPermissionsViaRoles();

        return view('admin.user.phanquyen')->with(compact('user', 'name_roles', 'permission', 'get_permission_via_role'));
    }

    public function phanvaitro($id)
    {
        $user = User::find($id);
        $role = Role::orderBy('id', 'DESC')->get();
        $all_column_roles = $user->roles->first();
        $permission = Permission::orderBy('id', 'DESC')->get();

        return view('admin.user.phanvaitro')->with(compact('user', 'role', 'all_column_roles', 'permission'));
    }

    public function insert_roles(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $user->syncRoles($data['role']);

        return redirect()->back()->with('status', 'Đổi vai trò cho user thành công!');
    }

    public function assign_permission(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $role_id = $user->roles->first()->id;
        //cap quyen
        $role = Role::find($role_id);
        $role->syncPermissions($data['permission']);

        return redirect()->back()->with('status', 'Đổi permission cho user thành công!');
    }

    public function insert_permission(Request $request)
    {
        $data = $request->all();
        $permission = new Permission();
        $permission->name = $data['permission'];

        $permission->save();
        return redirect()->back()->with('status', 'Thêm quyền thành công');
    }

    public function impersonate($id)
    {
        $user = User::find($id);
        if ($user){
            Session::put('impersonate', $user->id);
        }

        return redirect('/home');
    }
}
