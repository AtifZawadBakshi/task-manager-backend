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

    public function permissionCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions',
            'guard_name' => 'required',
        ]);

        if ($validator->fails()) {
            // $data['status'] = false;
            // $data['error'] = $validator->errors();
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $permission = Permission::create([

            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return response()->json([
            'status' => true,
            'permission' => $permission
        ]);
    }

    public function permissionEdit($id)
    {
        $permission = Permission::where('id', $id)->select('id','name','guard_name')->first();
        return response()->json($permission);
    }

    public function permissionUpdate(Request $request)
    {

        $permission = Permission::where('id', $request->id)->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name,' . $request->id,
            'guard_name' => 'required',
        ]);

        if ($validator->fails()) {
            // $data['status'] = false;
            // $data['error'] = $validator->errors();
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        // if ($validator->fails()) {
        //     $data['status'] = false;
        //     $data['errors'] = $validator->errors();
        //     return response()->json($data, 422);
        // }

        $permission = Permission::where('id', $request->id)->first();
        $permission->name = $request->name;
        $permission->guard_name= $request->guard_name;
        $permission->update();
        return response()->json([
            'status' => true,
            'permission' => $permission
        ]);
    }

    public function permissionDelete($id)
    {
        $merchant = Permission::where('id', $id)->first();
        if($merchant == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $merchant = Permission::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Permission Deleted Successfully!'
            ]);
        }

        // $permissionDelete = Permission::find($id)->delete();
        // return response()->json($permissionDelete);
    }

    public function permissionSearch($name)
    {
        if($name != null){
            $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
            $searchTerm = str_replace($reservedSymbols, ' ', $name);

            $searchValues = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

            $permissionSearch = Permission::where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $q->Where('name', 'like', "%{$value}%");//'/^\S*$/u', $value
                    // $q->orWhere('/^\S*$/u', 'like', "%{$value}%");//'/^\S*$/u', $value
                }
            })->latest()->paginate(10);
            return response()->json(
                $permissionSearch
            );
        }else{
            return response()->json(
                'Please input valuable data!'
            );
        }
    }
    public function empty(){
        return response()->json(
            'Please input valuable data!'
        );
    }

    public function role()
    {
        // return 'role';
        $showRole = Role::with('permissions')->latest()->paginate(10);
        return response()->json($showRole);
    }

    public function roleFind($id, Request $request)
    {
        try {
            $role             = Role::with('permissions')->find($id);
            $checkPermissions = $role->permissions->pluck('name');
            return response()->json([
                'status'          => true,
                'role'             => $role,
                'checkPermissions' => $checkPermissions,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function roleStore(Request $request)
    {
        // return response()->json($request);
        // $role = Role::create([
        //     'name' => $request->name,
        //     'guard_name' => $request->guard_name,
        // ]);
        // return response()->json($role, 201);

            $validator= $this->validationForm($request,$id="");
            if($validator->fails()){
                return response()->json(['status' =>false ,'errors' =>$validator->errors()]);
            }
            try {
                $role = Role::create([
                    'name' => $request->name,
                    'guard_name'=>$request->guard_name
                ]);
                // $roleHasPermission =
                if ($role) {
                    $role->givePermissionTo($request->permission_id);
                }
                return response()->json([
                    'status'=>true ,
                    'message'=>'Role Add successfully',
                    'role'=>$role
                ]);
             } catch (\Throwable $th) {
                 return response()->json(['status'=>false ,'errors'=>$th->getMessage()]);
             }
    }

    public function roleEdit($id)
    {
        $role = Role::with('permissions')->find($id);
        $checkpermissions = $role->permissions->pluck('id');

           $data['role'] =$role;
           $data['checkpermissions'] =$checkpermissions;


        return response()->json($data);
    }


    public function roleUpdate(Request $request, $id)
    {
            $role= Role::find($id);

            // return response()->json($request->permission);

            $validator= $this->validationForm($request,$role->id);

            if($validator->fails()){
                return response()->json(['status' =>false ,'errors' =>$validator->errors()]);
            }

            try {

                if(!empty($request->id && $role)){
                    $role->name=$request->name;
                    $role->guard_name=$request->guard_name;
                    if ($role->update()) {
                        $role->syncPermissions($request->permission_id);
                        return response()->json([
                            'status'=>true ,
                            'message'=>'Role Updated successfully',
                            'role'=>$role
                        ]);
                    }

                }
            } catch (\Throwable $th) {
                 return response()->json(['status'=>false ,'errors'=>$th->getMessage()]);
            }
    }

    public function roleDestroy(Request $request)
    {
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        $destroyRole = $role->revokePermissionTo($permission);
        return response()->json($destroyRole);

    }

    protected function validationForm($request, $id)
    {
        if($id !=""){
           $validator= Validator::make($request->all(),[
               'name'=>'required|unique:roles,name,'.$id
           ],[
             'name.required' =>" role name is required"
           ]);
       }else{
           $validator= Validator::make($request->all(),[
               'name'=>'required|unique:roles'
           ],[
             'name.required' =>" role name is required"
           ]);
       }
       return $validator;
   }

    public function roleDelete(Request $request)
    {
        $roleDelete = Role::find($request->id)->delete();
        return response()->json($roleDelete, 201);
    }

    public function roleHasPermission(Request $request)
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

    public function removeRole(Request $request)
    {
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        $removeRole = $permission->removeRole($role);
        return response()->json($removeRole, 200);
    }

    public function revokePermissionTo(Request $request)
    {
        // return 'revokePermissionTo';
        // $user = auth('user-api')->user();
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        $revokePermissionTo = $role->revokePermissionTo($permission);
        return response()->json($revokePermissionTo);
    }

    public function modelHasPermission(Request $request)
    {
        $user = auth('admin-api')->user();
        // $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        $modelHasPermission = $user->givePermissionTo($permission);
        return response()->json($modelHasPermission, 200);
    }

    public function modelHasRole(Request $request)
    {
        $user = auth('admin-api')->user();
        $role = Role::find($request->role_id);
        // $permission = Permission::find($request->permission_id);
        $modelHasRole = $user->assignRole($role);
        return response()->json($modelHasRole, 200);
    }

}
