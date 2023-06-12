<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq=Faq::latest()->get();
        return view('admin.faq',compact('faq'));
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
        $data=$request->validate([
            'question'=>'required',
            'answer'=>'required'
        ]);
        $faq=Faq::create([
            'question'=>$request->question,
            'answer'=>$request->answer,
        ]);
        if ($faq) {
            Session::flash('success', 'Question and Answer store Successfully');
        } else {
            Session::flash('success', 'Question and Answer not store!!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $faq=Faq::find($id)->delete([
            'question'=>$request->question,
            'answer'=>$request->answer,
        ]);
        if ($faq) {
            Session::flash('success', 'Question and Answer Delete Successfully');
        } else {
            Session::flash('success', 'Question and Answer not store!!');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faqedit=Faq::find($id);
        $faq=Faq::latest()->get();
        return view('admin.faq',compact('faqedit','faq'));
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
        $data=$request->validate([
            'question'=>'required',
            'answer'=>'required'
        ]);
            $faq=Faq::find($id)->update([
                'question'=>$request->question,
                'answer'=>$request->answer,
            ]);
            if ($faq) {
                Session::flash('success', 'Question and Answer update Successfully');
            } else {
                Session::flash('success', 'Question and Answer not store!!');
            }
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
    }
    public function show_faq()
    {
        $faq=Faq::all();
        return view('home.faq',compact('faq'));
    }
}
