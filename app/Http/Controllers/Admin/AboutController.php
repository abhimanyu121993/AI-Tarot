<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=BusinessSetting::where('key','about_us')->first();
        return view('admin.about',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function terms_condition()
    {
        $terms=BusinessSetting::where('key','terms_condition')->first();
        return view('admin.terms_condition',compact('terms'));
    }

    public function privacy_policy()
    {
        $privacy=BusinessSetting::where('key','privacy_policy')->first();
        return view('admin.privacy_policy',compact('privacy'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'about'=>'required',
        ]);
        $user=BusinessSetting::UpdateOrCreate(
            [
                'key'=>'about_us', 
            ],
            [
            'key'=>'about_us',
            'value'=>$request->about,
        ]);
        if($user)
            {
                Session::flash('success', 'About Added successfully');
            }
            else
            {
                Session::flash('error', 'About Not Added');
            }
        return redirect()->back();
    }
    public function store_terms_condition(Request $request)
    {
        $request->validate([
            'terms'=>'required',
        ]);
        $user=BusinessSetting::UpdateOrCreate(
            [
                'key'=>'terms_condition', 
            ],[
            'key'=>'terms_condition',
            'value'=>$request->terms,
        ]);
        if($user)
            {
                Session::flash('success', 'Terms Condition Added successfully');
            }
            else
            {
                Session::flash('error', 'About Not Added');
            }
        return redirect()->back();
    }
    public function store_privacy_policy(Request $request)
    {
        $request->validate([
            'privacy'=>'required',
        ]);
        $user=BusinessSetting::UpdateOrCreate(
            [
                'key'=>'privacy_policy', 
            ],[
            'key'=>'privacy_policy',
            'value'=>$request->privacy,
        ]);
        if($user)
            {
                Session::flash('success', 'Privacy Policy Added successfully');
            }
            else
            {
                Session::flash('error', 'Privacy Policy Not Added');
            }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
