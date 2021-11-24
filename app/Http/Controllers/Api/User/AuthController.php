<?php

namespace App\Http\Controllers\API\User;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class AuthController extends Controller
// {
//     //
// }

// <?php

// namespace App\Http\Controllers\API\User;

use App\Classes\GeniusMailer;
use App\Classes\SmsSender;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\RewordPoints;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Session;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:user-api', ['except' => ['login', 'register','logout']]);
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

        $user = User::create([
             'name'    => $request->name,
             'email'    => $request->email,
             'phone'    => $request->phone,
             'password' => Hash::make($request->password)
         ]);

        $token = auth('user-api')->login($user);

        return $this->createNewToken($token, $user);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

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

        if (! $token = auth('user-api')->attempt($validator->validated())) {
            return response()->json([
                'status' => false,
                'error' => 'Invalid Email or Password!'
            ], 401);
        }
        $user = auth('user-api')->user();
        return $this->createNewToken($token, $user);
    }

    public function logout()
    {
        auth('user-api')->logout();
        
        return response()->json(['status' => true, 'message' => 'Successfully logged out']);
    }

    public function profile()
    {
        
        // $user = auth('user-api')->user();
        // $user['temporary_points'] = RewordPoints::where(array('user_id' => $user->id, 'status' => 1))->where('permanent_date', '>', date("Y-m-d H:i:s"))->sum('credit');
        // $user['used_points'] = RewordPoints::where(array('user_id' => $user->id, 'status' => 1))->sum('debit');
        // $user['total_orders'] = $user->orders()->where('status','completed')->count();
        // $user['pending_orders'] = $user->orders()->where('status','pending')->count();

        // return response()->json(['status' => true, 'user' => $user]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token, $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token, $user)
    {
        return response()->json([
            'status' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'user'    => $user
        ]);
    }

    public function sendingOtp(Request $request)
    {
        //--- Validation Section

        $validator = Validator::make($request->all(), [
            'mobile'   => 'required|min:11|min:11',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['error'] = $validator->errors();
            return response()->json($data, 422);
        }
        
        //Set OTP Expire tme by adding 5 minutes
        $expiredTime = date('Y-m-d H:i:s', strtotime('+5 minutes', strtotime(date("Y-m-d H:i:s"))));
        // Sending SMS
        $smsSender = new SmsSender();
        $sms_data['toUser'] = $request->mobile;
        $otp = mt_rand(1000, 9999);
        $sms_data['message_content'] = 'Your FairMart One-Time Password (OTP) is '.$otp.' for '.$request->mobile.' number. This OTP will expire in '.date('h:i:s A', strtotime($expiredTime)).'

fairmart.com.bd';

        // If not use masking FAIRMART use this variable
        $sms_data['callerId'] = 'FAIRMART';
        $response = $smsSender->send_mobile_sms($sms_data);

        $response = json_decode($response->body());

        $user = User::where('phone', $request->mobile)->first();
        $user_status = false;
        $token = null; 
        $token_type = null;
        if(!empty($user)){
            $user_status = true;
            if (! $token = JWTAuth::fromUser($user)) {
                return response()->json([
                    'status' => false,
                    'error' => 'Invalid Email or Password!'
                ], 401);
            }
            $token_type = 'bearer';            
        }

        if (isset($response) && $response->Status == 0) {

            return response()->json([
              'status' => true, 
              'otp' => $otp,
              'access_token' =>$token,
              'token_type' => $token_type,
              'user' => $user,
              'user_status' => $user_status,
              'message'=> 'We sent a message with verification OTP code to '.$request->mobile.' number please check your mobile and write this in following field'
            ]);

        }
    }


    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile'   => 'required|min:11|min:11',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['error'] = $validator->errors();
            return response()->json($data, 422);
        }
        //Set OTP Expire tme by adding 5 minutes
        $expiredTime = date('Y-m-d H:i:s', strtotime('+5 minutes', strtotime(date("Y-m-d H:i:s"))));
        // Sending SMS
        $smsSender = new SmsSender();
        $sms_data['toUser'] =  $request->mobile;
        $opt = mt_rand(1000, 9999);

        $sms_data['message_content'] = 'Your FairMart One-Time Password (OTP) is '.$opt.' for '.$request->mobile.' number. This OTP will expire in '.date('h:i:s A', strtotime($expiredTime)).'
        
fairmart.com.bd';

        // If not use masking FAIRMART use this variable
        $sms_data['callerId'] = 'FAIRMART';
        $response = $smsSender->send_mobile_sms($sms_data);
        $response = json_decode($response->body());

        if (isset($response) && $response->Status == 0) {

            return response()->json([
                'status' => true, 
                'message'=>'We sent a message with verification OTP code to '.$request->mobile.' number please check your mobile and write this in following field'
            ]);

        }

    }

    public function profileUpdate(Request $request)
    {
        //--- Validation Section
        $rules =
        [
            'photo'     =>  'mimes:jpeg,jpg,png,svg|max:1080',
            'email'     =>  'unique:users,email,'.auth('user-api')->user()->id,
            'city'      =>  'required',
            'country'   =>  'required'
        ];
      
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->errors()));
        }
        //--- Validation Section Ends
        $input = $request->all();  
        $data = auth('user-api')->user();        
            if ($file = $request->file('photo'))
            {
                //return $file;              
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move('assets/images/users/',$name);
                if($data->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/users/'.$data->photo)) {
                        unlink(public_path().'/assets/images/users/'.$data->photo);
                    }
                }            
            $input['photo'] = $name;
            } 
        $data->update($input);

        return response()->json([
            'status' => true,
            'message' => 'Successfully updated your profile'
        ]); 
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'   => 'required|email',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['error'] = $validator->errors();
            return response()->json($data, 422);
        }

        $gs = Generalsetting::findOrFail(1);
        $input =  $request->all();
        if (User::where('email', '=', $request->email)->count() > 0) {
        // user found
        $admin = User::where('email', '=', $request->email)->firstOrFail();
        $autopass = Str::random(8);
        $input['password'] = bcrypt($autopass);
        $admin->update($input);
        $subject = "Reset Password Request";
        $msg = "Your New Password is : ".$autopass;
        if($gs->is_smtp == 1)
        {
            $data = [
                    'to' => $request->email,
                    'subject' => $subject,
                    'body' => $msg,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);                
        }
        else
        {
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            mail($request->email,$subject,$msg,$headers);            
        }
            return response()->json(['status' => true, 'message'=> 'Your Password Reseted Successfully. Please Check your email for new Password.']);
        }
        else{
            // user not found
            return response()->json([
                'status' => false,
                'error' => 'No Account Found With This Email.'
            ]);    
        }  
    }

    public function changePassword(Request $request)
    {
        $user = auth('user-api')->user();
        if ($request->old_pass){
            
            if (Hash::check($request->old_pass, $user->password)){
                
                if ($request->newpass == $request->renewpass){
                    
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    return response()->json([
                        'status' => false,
                        'error' => 'Confirm password does not match.'
                    ]);     
                }
            }else{
                return response()->json([
                    'status' => false,
                    'error' => 'Current password Does not match.'
                ]);
            }
        }
        $user->update($input);
        return response()->json([
            'status' => true,
            'message' => 'Successfully changed your password.'
        ]);
    }
}
