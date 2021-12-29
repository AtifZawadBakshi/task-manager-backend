<?php

namespace App\Http\Controllers;

// use db;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
// use Spatie\Permission\Contracts\Role;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\HasRole;
use Spatie\Permission\Traits\HasRole;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('auth:web', ['except' => ['store']]);
    // }

    public function permission()
    {
        $permissions = Permission::latest()->paginate(10);
        return response()->json($permissions);
    }

    public function role(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return response()->json($role, 201);
    }

    public function roleDelete(Request $request)
    {
        $roleDelete = Role::find($request->id)->delete();
        return response()->json($roleDelete, 201);
    }

    public function permissionCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions',
            'guard_name' => 'required',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['error'] = $validator->errors();
            return response()->json($data, 422);
        }

        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return response()->json($permission, 201);
    }

    public function permissionEdit($id)
    {
        $permission = Permission::where('id', $id)->select('id','name','guard_name')->first();
        return response()->json($permission);
    }

    public function permissionUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'guard_name' => 'required',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['error'] = $validator->errors();
            return response()->json($data, 422);
        }

        $permission = Permission::where('id', $request->id)->first();
        $permission = $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return response()->json($permission);
    }

    public function permissionDelete(Request $request)
    {
        $permissionDelete = Permission::find($request->id)->delete();
        return response()->json($permissionDelete, 201);
    }

    public function role_has_permission(Request $request)
    {
        // return 'ok';
        $role = Role::find($request->role_id);
        // return $role->id;
        // return $permission = Permission::findById($request->permission_id);
        $permission = Permission::find($request->permission_id);
        // return $permission->id;
        $roleHasPermission = $role->givePermissionTo($permission);
        // return $roleHasPermission;
        return response()->json($roleHasPermission, 201);
    }

    public function remove_role(Request $request)
    {
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        $remove_role = $permission->removeRole($role);
        return response()->json($remove_role, 200);
    }

    public function revoke_Permission_To(Request $request)
    {
        // $user = auth('user-api')->user();
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        $remove_permission = $role->revokePermissionTo($permission);
        return response()->json($remove_permission, 200);
    }

    public function model_Has_Permission(Request $request)
    {
        $user = auth('admin-api')->user();
        // $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        $model_Has_Permission = $user->givePermissionTo($permission);
        return response()->json($model_Has_Permission, 200);
    }

    public function model_Has_Role(Request $request)
    {
        $user = auth('admin-api')->user();
        $role = Role::find($request->role_id);
        // $permission = Permission::find($request->permission_id);
        $model_Has_Role = $user->assignRole($role);
        return response()->json($model_Has_Role, 200);
    }

    public function permissionSearch($name) 
    {
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $searchTerm = str_replace($reservedSymbols, ' ', $name);

        $searchValues = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

        $permissionSearch = Permission::where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
                $q->Where('name', 'like', "%{$value}%");
            }
        })->latest()->paginate(10);
        return response()->json(
            $permissionSearch
        );
    }

}
