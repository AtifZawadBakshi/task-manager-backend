<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Spatie\Permission\Contracts\Role;
// use Spatie\Permission\Traits\HasRole;
// use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('auth:web', ['except' => ['store']]);
    // }

    public function index()
    {
        $role = Role::all();
        $permission = Permission::all();
        return response()->json(['Role' => $role, 'Permission' => $permission], 200);
    }

    public function role(Request $request)
    {
        // return User::all();
        // return 'ok';
        $role = Role::create([
            'name' => $request->name,
        ]);
        // return 'ok';
        return response()->json($role, 201);
    }

    public function permission(Request $request)
    {
        // return User::all();
        // return 'ok';
        $permission = Permission::create([
            'name' => $request->name,
        ]);
        // return 'ok';
        return response()->json($permission, 201);
    }

    public function role_has_permission(Request $request)
    {
        $role = Role::findById($request->role_id);
        $permission = Permission::findById($request->permission_id);
        $roleHasPermission = $role->givePermissionTo($permission);
        return response()->json($roleHasPermission, 201);
    }

    public function remove_role(Request $request)
    {
        $role = Role::findById($request->role_id);
        $permission = Permission::findById($request->permission_id);
        $remove_role = $permission->removeRole($role);
        return response()->json($remove_role, 200);
    }

    public function revoke_Permission_To(Request $request)
    {
        $role = Role::findById($request->role_id);
        $permission = Permission::findById($request->permission_id);
        $remove_permission = $role->revokePermissionTo($permission);
        return response()->json($remove_permission, 200);
    }
}
