<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Admin;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Admin;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
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

    // public function register(Request $request) {
    //     $fields = $request->validate([
    //         // 'name' => 'required|string',
    //         // 'email' => 'required|string|unique:users,email',
    //         // 'password' => 'required|string|confirmed'
    //     ]);

    //     $user = Admin::create([
    //         'name' => $fields['name'],
    //         'email' => $fields['email'],
    //         'password' => bcrypt($fields['password']),
    //     ]);

    //     $token = $user->createToken('myapptoken')->plainTextToken;

    //     $response = [
    //         'user' => $user,
    //         'token' => $token
    //     ];
    //     // return response($response, 201);
    //     return $result = response()->json($response, 201);
    //     // return response()-json(['ok',201]);
    // }


    // public function login(Request $request){

    //     $fields = $request->validate([
    //         'email' => 'required|string',
    //         'password' => 'required|string'
    //     ]);

    //     // Check email
    //     $user = Admin::where('email', $fields['email'])->first();

    //     // Check password
    //     if(!$user || !Hash::check($fields['password'], $user->password)) {
    //         return response([
    //             'message' => 'Bad creds'
    //         ], 401);
    //     }

    //     $token = $user->createToken('myapptoken')->plainTextToken;

    //     $response = [
    //         'user' => $user,
    //         'token' => $token
    //     ];

    //     return response()->json($response, 201);
    // }
}
