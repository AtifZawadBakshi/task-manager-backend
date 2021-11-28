<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Session;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    // use GeneralTrait;
    public function __construct()
    {
       $this->middleware('auth:admin-api', ['except' => ['login', 'register','logout']]);
    }

    public function register(Request $request)
    {
        // return 'register';
        $validator = Validator::make($request->all(), [
            'email'  => 'required|email|max:100|unique:users',
			'phone'  => 'required|min:11|max:14|unique:users',
            'name'   => 'required|min:4|max:100',
            'password' => 'required|min:6|max:100'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['error'] = $validator->errors();
            return response()->json($data, 422);
        }
        // return 3;
        $user = Admin::create([
             'name'    => $request->name,
             'email'    => $request->email,
             'phone'    => $request->phone,
             'password' => Hash::make($request->password)
         ]);

        $token = auth('admin-api')->login($user);

        return $this->createNewToken($token, $user);
    }

    protected function createNewToken($token, $user)
    {
        return response()->json([
            'status' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'user'    => $user
        ]);
    }

    public function login(Request $request)
    {
        
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['error'] = $validator->errors();
            return response()->json($data, 422);
        }

        if (! $token = auth('admin-api')->attempt($validator->validated())) {
            return response()->json([
                'status' => false,
                'error' => 'Invalid Email or Password!'
            ], 401);
        }
        $user = auth('admin-api')->user();
        return $this->createNewToken($token, $user);
    }

    public function logout()
    {
        auth('admin-api')->logout();
        
        return response()->json(['status' => true, 'message' => 'Successfully logged out']);
    }

    public function profile()
    {
        $user = auth('admin-api')->user();

        return response()->json(['status' => true, 'user' => $user]);

    }

    public function userList(){
        $userList = Admin::all();
        return response()->json(['status' => true, 'user' => $userList]);
    }
}
