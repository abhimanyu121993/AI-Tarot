<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscription=SubscriptionPlan::all();
        return view('admin.subscription',compact('subscription'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'limit' => 'required',
            'price' => 'required',
            'discount_value' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $upic = 'image-' . time() . '-' . rand(0, 99) . '.' . $request->image->extension();
            $request->image->move(public_path('upload/subscription_image/'), $upic);
            $pic_name = 'upload/subscription_image/' . $upic;
        }
        $data = [
            'name' => $request->name,
            'limit' => $request->limit,
            'price' => $request->price,
            'discount_value' => $request->discount_value,
            'description' => $request->description	,
            'image' => $pic_name,
        ];
        $user = SubscriptionPlan::create($data);
        if ($user) {
            Session::flash('success', 'Subscription Added successfully');
        } else {
            Session::flash('error', 'Subscription Not Added');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscription=SubscriptionPlan::all();
        $subscriptionvalue = SubscriptionPlan::find($id);
        return view('admin.subscription', compact('subscriptionvalue','subscription'));
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
        $request->validate([
            'name' => 'required',
            'limit' => 'required',
            'price' => 'required',
            'discount_value' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $upic = 'image-' . time() . '-' . rand(0, 99) . '.' . $request->image->extension();
            $request->image->move(public_path('upload/subscription_image/'), $upic);
            $pic_name = 'upload/subscription_image/' . $upic;
        }
        $data = [
            'name' => $request->name,
            'limit' => $request->limit,
            'price' => $request->price,
            'discount_value' => $request->discount_value,
            'description' => $request->description	,
            'image' => $pic_name,
        ];
        $user = SubscriptionPlan::find($id)->Update($data);
        if ($user) {
            Session::flash('success', 'Subscription Updated successfully');
        } else {
            Session::flash('error', 'Subscription Not Update');
        }
        return redirect()->back();
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
