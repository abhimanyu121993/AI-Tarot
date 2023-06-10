<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
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
        return view('home.index');
    }

    public function readTarot()
    {
        return view('read_tarot');
    }
}
