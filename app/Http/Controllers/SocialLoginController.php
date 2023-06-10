<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserResponse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SocialLoginController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){
                $saveUser = User::create([
                    'first_name' => $user->getName(),
                    'last_name' => 'User',
                    'pic' => $user->getAvatar(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                ]);

            }else{
                $updateUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }
            $checkFreeTrialUser = UserResponse::where('user_id', $saveUser->id)->get();
            if($checkFreeTrialUser->count() > 3 ){

                Alert::warning('Opps!', 'You have exhausted the quota.Please subscribe to continue');
                return redirect()->route('home');
            }else{
                Auth::loginUsingId($saveUser->id);

                toast('You have logged in successfully', 'success');
                return redirect()->route('askTarot');
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
