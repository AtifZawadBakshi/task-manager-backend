<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Admin;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // use GeneralTrait;

    public function register(Request $request) {
        $fields = $request->validate([
            // 'name' => 'required|string',
            // 'email' => 'required|string|unique:users,email',
            // 'password' => 'required|string|confirmed'
        ]);

        $user = Admin::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        // return response($response, 201);
        return $result = response()->json($response, 201);
        // return response()-json(['ok',201]);
    }


    public function login(Request $request){
        // return 'ok';
        // $rules = [
        //     "email" => "required|exists:admins,email",
        //     'password' => "required"
        // ];
        // $validator = Validator::make($request->all(), $rules);

        // if($validator->fails()){
        //     $code = $this->returnCodeAccordingToInput($validator);
        //     return $this->returnValidationError($code, $validator);
        // }

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = Admin::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 201);
    }
}
