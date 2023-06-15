<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use App\Models\Faq;
use App\Models\SubscribeNewsletter;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function comingSoon()
    {
        return view('coming_soon');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $isSubscribed = SubscribeNewsletter::where('email', $request->email)->first();

        if(!$isSubscribed){
            SubscribeNewsletter::create([
                'email' => $request->email
            ]);

            toast('You have subscribed to our newsletter','success');
        }
        else{
            toast('You area already subscribed to our newsletter','error');
        }

        return redirect()->back();
    }

    public function home()
    {
        $faq=Faq::all();
        $about=BusinessSetting::where('key','about_us')->first();
        return view('home.index',compact('faq','about'));
    }

    public function readTarot()
    {
        return view('read_tarot');
    }
    public function ShowAbout()
    {
        $about=BusinessSetting::where('key','about_us')->first();
        return view('home.about',compact('about'));
    }
    public function ShowTerms()
    {
        $terms=BusinessSetting::where('key','terms_condition')->first();
        return view('home.terms_condition',compact('terms'));
    }
    public function ShowPrivacy()
    {
        $privacy=BusinessSetting::where('key','privacy_policy')->first();
        return view('home.privacy_policy',compact('privacy'));
    }
}
