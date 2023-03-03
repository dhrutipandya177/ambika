<?php

namespace App\Http\Controllers\Api;

use App\Currency;
use App\Helpers\Openfire;
use App\Http\Requests\Api\Auth\ContactUsRequest;
use App\Http\Requests\Api\Auth\SocialRegisterRequest;
use App\Http\Requests\Api\testimonialAddRequest;
use App\Models\ContactUs;
use App\Models\MonthlyBudgetHistory;
use App\Models\Notification;
use App\Models\Quote;
use App\Models\TipOfTheDay;
use App\Models\UserCardDetails;
use App\Models\walletTransactionHistory;
use App\User;
use App\Models\UserFixMonthlyExp;
use App\Models\UserGoalTransaction;
use App\Models\UserRatting;
use App\Models\UserStaticTransaction;
use App\Models\userTestimonial;
use App\Models\UserTransaction;
use App\Models\Video;
use App\UserBankDetail;
use App\UserSusuDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Auth\ProfileRequest;
use App\Http\Requests\Api\Auth\SusuDetailsRequest;
use App\Http\Requests\Api\ImageRequest;
use App\Models\TransactionType;
use App\Models\UserPaymentDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Stripe;

class UserController extends BaseApiController
{
    public function uploadProfile(ImageRequest $request) {
        if($request->file('image')->isValid()){
            $avatarMedia = $request->file('image');
            $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
            $photoName = time() .'_'. $strippedName;

            \Storage::disk('local')->put('/uploads/users/avatars/' . $photoName, file_get_contents($avatarMedia));

            return self::sendResponse(['avatar' => $photoName], 'Avatar uploaded successfully.');
        }
        return self::sendError([], 'Please Upload Valid Image File.', 400);
    }

    public function getuser(Request $request){
        $user=User::where('id',$request->user()->id)->first();
        return Self::sendResponse($user,"User Details");
    }

    public function contactUs(ContactUsRequest $request)
    {
        if(ContactUs::create([
            'subject'   => $request->subject,
            'message'   => $request->message
        ]))
            return self::sendResponse([], 'Thank you for your message. We will get back to you soon');
        return self::sendError([], 'Something went wrong', 500);
    }

    public function editAccountInfo(Request $request){
         //validate form field
        $input = $request->all();
        $rules = array(
            'name' => "required",
            'email' => "required|email",
            //'image' => "required|image|mimes:jpeg,png,jpg|max:2048",
            'phone_no' => "required",
            'company_name' => "required",
            'company_address' => "required",
            'company_birth_date' => "required",
            'gst_no' => "required",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
          $msg = $validator->errors()->first();
        }else{
           //$user=User::where('id',$request->user()->id)->where('verification_at','=',1)->first();
           $user = $request->user();
           //var_dump($user);die();
           //check for new email exist or not
           $checkEmail = User::where('email','=',$request->email)->where('id','!=',$request->user()->id)->where('verification_at','=',1)->first();

            if(!empty($user) && empty($checkEmail)){
               
               if ($request->hasFile('profile_pic')) {
                    $rules = array(
                        'profile_pic' => "required|image|mimes:jpeg,png,jpg|max:2048",
                    );
                    $validator = Validator::make($input, $rules);
                    if ($validator->fails()) {
                      $msg = $validator->errors()->first();
                    }else{
                        $imageName = time().'.'.$request->profile_pic->extension();  
                        $request->profile_pic->move(public_path('uploads/profile'), $imageName); 
                        $updateUser = User::where('id',$request->user()->id)->update(array('profile_pic'=>$imageName));
                    }    
                }

                if($request->has('password') && $request->password != ''){
                    $user->update(['password'=>bcrypt($request->password)]);
                }

               $updateUserData = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_no' => $request->phone_no,
                    'company_name' => $request->company_name,
                    'company_address' => $request->company_address,
                    'company_birth_date' => $request->company_birth_date,
                    'gst_no' => $request->gst_no,
                ];

                $updateUser = User::where('id',$request->user()->id)->update($updateUserData);
                $user = User::where('id',$request->user()->id)->first();

                /*var_dump($updateUser);//exit;
                if($updateUser){
                    echo "Updated";
                }else{
                     echo "Not Updated";
                }
                exit;*/

                if ($updateUser) {
                    //success for update account info
                    return Self::sendResponse($user, 'Your profile has been updated successfully.');
                }else{
                    //error for update account info
                    //return Self::sendResponse($user, 'Failed to update your profile. please try again later.');
                    return Self::sendResponse($user, 'Profile value is already updated.');
                }
            }else{
                //error for user not found or email already exist
                return Self::sendResponse($user, 'Something went wrong. please try again later.');
            } 
        }        
    }
}
