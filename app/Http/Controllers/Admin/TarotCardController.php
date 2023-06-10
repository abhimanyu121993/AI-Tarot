<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TarotBackground;
use App\Models\TarotCard;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class TarotCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tarotCard.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarot=TarotCard::all();
        return view('admin.tarotCard.edit',compact('tarot'));
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
            'alt_name' => 'required',
            'keyword_1' => 'required',
            'meanings' => 'required',
            'keyword_2' => 'required',
            'mystic_mirror' => 'required',
            'numerology'=>'required',
            'card_images'=>'required',
        ]);
            if($request->hasFile('card_images'))
            {
                $upic='card_images-'.time().'-'.rand(0,99).'.'.$request->card_images->extension();
                $request->card_images->move(public_path('upload/card_images/'),$upic);
                $pic_name = 'upload/card_images/'.$upic;
            }
            $data = [
                'name' => $request->name,
                'alt_name' => $request->alt_name,
                'meanings' => $request->meanings,
                'keywords_1' => $request->keyword_1,
                'keywords_2' => $request->keyword_2,
                'mystic_mirror' => $request->mystic_mirror,
                'numerology' => $request->numerology,
                'card_images'=>$pic_name,
            ];
            $user = TarotCard::create($data);
            if($user)
            {
                Session::flash('success', 'Tarot Card Created successfully');
            }
            else
            {
                Session::flash('error', 'Tarot Card Not Created');
            }
        return redirect()->back();
    }
    public function T_Background_post(Request $request)
    { 
        $request->validate([
            'background_images'=>'required',
        ]);
        $files = $request->file('background_images');
            if($request->hasFile('background_images')){
                foreach($files as $file){
                $upic='background_images-'.time().'-'.rand(0,99).'.'.$file->extension();
                $file->move(public_path('upload/background_images/'),$upic);
                $pic_name[] = 'upload/background_images/'.$upic;
                }
            }
            $data = [
                'background_images'=>json_encode($pic_name),
            ];
            $user = TarotBackground::create($data);
            if($user)
            {
                Session::flash('success', 'Tarot Background Created successfully');
            }
            else
            {
                Session::flash('error', 'Tarot Background Not Created');
            }
        return redirect()->back();
    }
    public function T_Background_delete($id)
    {
        if(TarotBackground::find($id)->delete()) {
            return back()->with('success', 'Torad Background deleted successfully');
        }
        else {
            return back()->with('failed', 'Oh! Torad Background did not deleted successfully');
        }
    }
    public function T_Background()
    {
        $tarot=TarotBackground::all();
        return view('admin.tarot_background',compact('tarot'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(TarotCard::find($id)->delete()) {
            return back()->with('success', 'Torad Card deleted successfully');
        }
        else {
            return back()->with('failed', 'Oh! Torad Card did not deleted successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarotCard=TarotCard::find($id);
        return view('admin.tarotCard.add',compact('tarotCard'));
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
            'alt_name' => 'required',
            'keyword_1' => 'required',
            'meanings' => 'required',
            'keyword_2' => 'required',
            'mystic_mirror' => 'required',
            'numerology'=>'required',
            'card_images'=>'required',
        ]);
            if($request->hasFile('card_images'))
            {
                $upic='card_images-'.time().'-'.rand(0,99).'.'.$request->card_images->extension();
                $request->card_images->move(public_path('upload/card_images/'),$upic);
                $pic_name = 'upload/card_images/'.$upic;
            }
            $data = [
                'name' => $request->name,
                'alt_name' => $request->alt_name,
                'meanings' => $request->meanings,
                'keywords_1' => $request->keyword_1,
                'keywords_2' => $request->keyword_2,
                'mystic_mirror' => $request->mystic_mirror,
                'numerology' => $request->numerology,
                'card_images' => $pic_name,
            ];
            $user = TarotCard::find($id)->Update($data);
            if($user)
            {
                Session::flash('success', 'Tarot Card Updated successfully');
            }
            else
            {
                Session::flash('error', 'Tarot Card Not Updated');
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
