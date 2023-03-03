<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\User\Registrationrequest;
use App\Http\Requests\Api\User\Loginrequest;
use App\Http\Requests\Api\User\ForgotPassword;
use App\Http\Requests\Api\User\ChangePasswordRequest;
use App\Http\Requests\Api\User\RecoverPassword;
use App\Http\Requests\Api\User\socialLoginRequest;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseApiController
{
    public function login(Loginrequest $request){
        if(is_numeric($request->phone_no)){
            $requestArray=['phone_no' => $request->phone_no, 'password' => $request->password /*, 'user_type'=> 1*/];
        }else{
            $requestArray=['email' => $request->phone_no, 'password' => $request->password /*, 'user_type'=> 1*/];
        }
         /*if(is_numeric($request->phone_no)){
            $requestArray=['phone_no' => $request->phone_no, 'password' => $request->password];
        }else{
            $requestArray=['email' => $request->email, 'password' => $request->password];
        }*/
        //$requestArray=['phone_no' => $request->phone_no,'email'=>$request->email,'password' => $request->password];
        
        if(Auth::guard('user')->attempt($requestArray)){
            $user = Auth::guard('user')->user();
           /* if(DB::table('oauth_access_tokens')->where('user_id', $user->id)->where('expires_at', '>', date('Y-m-d H:i:s'))->count() > 0 && $request->force != 1){
                return Self::sendError(new \StdClass(), 'You are already login from another device.', 409);
            }
            if($request->force == 1){
                DB::table('oauth_access_tokens')->where('user_id', $user->id)->delete();
            }*/
            DB::table('oauth_access_tokens')->where('user_id', $user->id)->delete();
            $user->device_type = $request->device_type;
            $user->device_token = $request->device_token;
            $user->save();
            return Self::sendResponse(['id' => $user->id, 'token' => $user->createToken('Ambica')->accessToken, 'otp'=>$user->otp, 'userInfo'=>$user], 'Login Success');
        }
        return Self::sendError(new \StdClass(), 'Invalid Username and password.', 400);
    }

    public function verify(Request $request) {
        //return $request->user();
        try{
            // if ($request->user()->is_otp_verify) {
            //     return Self::sendResponse([], 'Your Account already verified.');
            // }

            if(empty($request->otp)){
                return Self::sendError(['otp' => 'OTP Field is required'], 'Validation Error.', 422);
            }

            if ($request->otp == $request->user()->verification_code){
                $request->user()->verification_at=1;
                $request->user()->save();
                return Self::sendResponse(['token' => $request->user()->createToken('Ambica')->accessToken,'userInfo'=>$request->user()], 'Your account has been verified successfully.');
            }

            return Self::sendError(['otp' => 'Your OTP does not match.'], 'Validation Error.', 422);
        } catch(\Throwable $th){
            return Self::sendError($th);
        }
    }

    public function reSendOtp(Request $request){
          //$user = $request->user()->id;
          $user=User::where('id',$request->user()->id)->first();
          $user->verification_code = rand(1000, 9999);
          $user->save();
          $user->refresh();
          
          return Self::sendResponse(['otp' => $user->verification_code], 'OTP send successfully');
    }

    public function registration(Registrationrequest $request){
        $user=User::where('user_type',1)->where(function ($query) use ($request/*, $variable*/) {
                          $query->where('phone_no',$request->phone_no)->orwhere('email',$request->email);
                    })->first();

       if(!empty($user) && $user->verification_at == 0){
           return Self::sendError([], 'You are already register please verify your acount.', 400);
       }elseif(!empty($user) &&  $user->verification_at == 1){
           return Self::sendError([], 'You are already register,please login to countine', 400);
           //$user->otp = rand(1000, 9999);
       }else{
           $otp = rand(1000, 9999);
           /*$user=new User();
           $user->name = $request->name;
           $user->email = $request->email;
           $user->verification_code = 1234;
           $user->password = bcrypt($request->password);
           $user->phone_no = $request->phone_no;
           $user->company_name = $request->company_name;
           $user->company_address = $request->company_address;
           $user->company_birth_date = $request->company_birth_date;
           $user->gst_no = $request->gst_no;
           $user->device_type = $request->device_type;
           $user->device_token = $request->device_token;
           $user->save();
           return Self::sendResponse(['id' => $user->id, 'token' => $user->createToken('Ambica')->accessToken, 'otp'=>$user->otp, 'userInfo'=>$user], 'You have registered successfully.');*/

            return Self::sendResponse(['otp' => $otp], 'Your Registration OTP sent successfully.');
       }
    }

    public function registrationVerify(Registrationrequest $request){
         if(isset($request->otp)){
             $user=new User();
             $user->name = $request->name;
             $user->email = $request->email;
             $user->verification_code = $request->otp;
             $user->password = bcrypt($request->password);
             $user->phone_no = $request->phone_no;
             $user->company_name = $request->company_name;
             $user->company_address = $request->company_address;
             $user->company_birth_date = $request->company_birth_date;
             $user->gst_no = $request->gst_no;
             $user->device_type = $request->device_type;
             $user->device_token = $request->device_token;
             $user->save();
             return Self::sendResponse(['id' => $user->id, 'token' => $user->createToken('Ambica')->accessToken, 'otp'=>$user->otp, 'userInfo'=>$user], 'You have registered successfully.');
         }else{
            return Self::sendResponse([], 'Please send Registration OTP.',400);
         }
    }

    public function socialLogin(socialLoginRequest $request)
    {
        $is_exists=User::where('email',$request->email)->first();
        if(!empty($is_exists)){
            if($request->social_type == 'Facebook'){
                $is_exists->fb_social_id=$request->social_id;
            }
            if($request->social_type == 'Google'){
                $is_exists->google_social_id=$request->social_id;
            }
            if($request->social_type == 'Apple'){
                $is_exists->apple_social_id=$request->social_id;
            }
            $is_exists->device_type=$request->device_type;
            $is_exists->device_token=$request->device_token;
            $is_exists->save();
            \Log::info($is_exists);
            return Self::sendResponse(['user' => $is_exists,'token' => $is_exists->createToken('Ambica')->accessToken], 'User exists');
        }else{
            if($request->social_type == 'Facebook')
                $fb_social_id = $request->social_id;
            elseif($request->social_type == 'Google')
                $google_social_id = $request->social_id;
            elseif($request->social_type == 'Apple')
                $apple_social_id = $request->social_id;
            $user = User::updateOrCreate(['email'=> $request->email_id],[
                'name'         => $request->name,
                'email'        => $request->email,
                'phone_no'       => $request->mobile,
                'verification_code'  => 1234,
                'password'     => bcrypt($request->password),
                'social_type'  => $request->social_type,
                'fb_social_id'=> $fb_social_id ?? '',
                'google_social_id'=> $google_social_id ?? '',
                'apple_social_id' => $apple_social_id ?? ''
            ]);
            return Self::sendResponse(['user' => $user,'token' => $user->createToken('Ambica')->accessToken], 'User exists');
        }
    }

    public function forgotPassword_old(Request $request){
      $input = $request->all();
      $rules = array(
          'email' => "required|email",
      );
      $validator = Validator::make($input, $rules);
      if ($validator->fails()) {
          $msg = $validator->errors()->first();
      } else {
          try {
              /*$response = Password::sendResetLink($request->only('email'), function (Message $message) {
                  $message->subject($this->getEmailSubject());
              });
              switch ($response) {
                  case Password::RESET_LINK_SENT:
                      return \Response::json(array("status" => 200, "message" => trans($response), "data" => array()));
                  case Password::INVALID_USER:
                      return \Response::json(array("status" => 400, "message" => trans($response), "data" => array()));
              }*/

               $user = User::where('phone_no', $request->phone_no)->orwhere('email',$request->email)->first();
              /*if($user->fb_social_id != '' || $user->google_social_id || $user->apple_social_id){
                    return self::sendError(['mobile' => 'This phone number is not registered with us.'], 'Validation Error.', 422);
                }*/
              if(!$user)
                $msg = 'This email/phone number is not registered with us.';

              $user->verification_code = rand(1000, 9999);
              $user->save();
              $user->refresh();

              /*Email link to user*/
              //$user->sendEmailVerificationNotification();

              return Self::sendResponse(['otp' => $user->verification_code], 'New OTP sent successfully.');

          } catch (\Swift_TransportException $ex) {
              $msg = $ex->getMessage();
          } catch (Exception $ex) {
              $msg = $ex->getMessage();
          }
      }
      //return \Response::json($arr);
      return Self::sendResponse(new \StdClass(), $msg);
    }

    public function recoverPassword_old(Request $request) {
         $input = $request->all();
        $rules = array(
            'otp' => "required",
            'new_password' => "required",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $msg = $validator->errors()->first();
        } else {
          $user = User::where(['phone_no' => $request->phone_no, 'verification_code' => $request->otp])->first();
          if($user){
              $user->password = bcrypt($request->new_password);
              $user->save();
              return Self::sendResponse([], 'Your account password changed successfully.');
          }
          return Self::sendError(['otp' => 'Your OTP does not match.'], 'Validation Error.', 422);
        } 
        return Self::sendResponse(new \StdClass(),$msg); 
    }

    public function changePassword_old(Request $request){
      $input = $request->all();
      $userid = Auth::guard('api')->user()->id;
      $user = User::find($request->user()->id);

      $rules = array(
          'old_password' => 'required',
          'new_password' => 'required|min:6',
          'confirm_password' => 'required|same:new_password',
      );
      $validator = Validator::make($input, $rules);
      if ($validator->fails()) {
          $msg =  $validator->errors()->first();
      } else {
          try {
              if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                  $msg = "Check your old password.";
              } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                  $msg = "Please enter a password which is not similar then current password.";
              } else {
                  
                  /*if(Hash::check($request->old_password, $request->user()->password)){
                      $user = User::find($request->user()->id);
                      $user->password = bcrypt($request->new_password);
                      $user->save();
                      return Self::sendResponse(new \stdClass(), 'Password changed Successfully.');
                  }
                  return Self::sendError(['password' => 'Invalid Old Password.'], 'Validation Error.', 422);
                  */


                  User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                  $msg = "Password updated successfully.";
              }

              /*User::where('id', $userid)->update(['password' => Hash::make($input['password'])]);
              $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array('verification_code'=>1234));*/

          } catch (\Exception $ex) {
              if (isset($ex->errorInfo[2])) {
                  $msg = $ex->errorInfo[2];
              } else {
                  $msg = $ex->getMessage();
              }
              //$arr = array(array("status" => 400), $msg);
          }
      }
     
      return Self::sendResponse(['id' => $user->id, /*'token' => $user->createToken('Ambica')->accessToken, 'otp'=>$user->otp*/],$msg);
    }

    /*NEW APIs*/
    public function forgotPassword(ForgotPassword $request) {
        //$user = User::where('phone_no', $request->phone_no)->where('country_code',$request->country_code)->first();
        $user = User::where('phone_no', $request->email)->orwhere('email',$request->email)->first();
        if(!$user)
             if(is_numeric($request->email)){
                return self::sendError(['msg' => 'This phone number is not registered with us.'], 'Validation Error.', 422);
             }else{
                return self::sendError(['msg' => 'This email is not registered with us.'], 'Validation Error.', 422);
             }
            

        $user->verification_code = rand(1000, 9999);
        $user->save();
        $user->refresh();

        //$user->sendEmailVerificationNotification();

        return Self::sendResponse(['otp' => $user->verification_code], 'New OTP sent successfully');
    }

    public function recoverPassword(RecoverPassword $request) {
        //$user = User::where(['phone_no' => $request->email, 'verification_code' => $request->otp])->first();
        $user = User::where(['phone_no' => $request->email, 'verification_code' => $request->otp])->orwhere(['email'=> $request->email, 'verification_code' => $request->otp])->first();
        if($user){
            $user->password = bcrypt($request->new_password);
            $user->save();
            return Self::sendResponse([], 'Your account password changed successfully.');
        }
        return Self::sendError(['otp' => 'Your OTP does not match.'], 'Validation Error.', 422);
    }

    public function changePassword(ChangePasswordRequest $request) {
        if(Hash::check($request->old_password, $request->user()->password)){
            $user = User::find($request->user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return Self::sendResponse(new \stdClass(), 'Password changed Successfully.');
        }
        return Self::sendError(['password' => 'Invalid Old Password.'], 'Validation Error.', 422);
    }

    public function logout(Request $request){
        //$user = User::find($request->user()->id);
        $user=$request->user();
        $user->device_token=null;
        $user->save();
        DB::table('oauth_access_tokens')->where('user_id', $request->user()->id)->delete();
        return Self::sendResponse(new \stdClass(), 'Logout Successfull.');
    }
}
