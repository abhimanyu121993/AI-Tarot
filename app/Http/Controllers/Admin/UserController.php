<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Error;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return view('admin.user', compact('users', 'roles'));
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
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required',
            'roleid' => 'required',
            'phone' => 'nullable',
            'pic' => 'nullable|image'
        ]);
        try{
            $default_password = '12345';
            $pic_name = 'assets/images/default_user.png';
            if($request->hasFile('pic'))
            {
                $upic='user-'.time().'-'.rand(0,99).'.'.$request->pic->extension();
                $request->pic->move(public_path('upload/user/'),$upic);
                $pic_name = 'upload/user/'.$upic;
            }
            $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($default_password),
                'pic' => $pic_name
            ];
            $user = User::create($data);
            $role_name = Role::find($request->roleid);
            if($user)
            {
                $user->assignRole($role_name);
                Session::flash('success', 'User registered successfully');
            }
            else
            {
                Session::flash('error', 'User not registered');
            }
        }
        catch(Exception $ex)
        {
            $url=URL::current();
            Error::create(['url'=>$url,'message'=>$ex->getMessage()]);
            Session::flash('error','Server Error ');
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
        if(User::find(Crypt::decrypt($id))->delete()) {
            return back()->with('success', 'User deleted successfully');
        }
        else {
            return back()->with('failed', 'Oh! User did not deleted successfully');
        }
    }
    public function profile()
    {
        return view('admin.profile.user_profile');
    }
    public function editProfile()
    {
        $udata=User::find(Auth::user()->id);
        // dd($udata);
        return view('admin.profile.edit_profile',compact('udata'));
    }
    public function updateProfile(Request $request)
    {
        // dd($request);
        $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'phone' => 'nullable'
        ]);

        $upic = Auth::user()->pic;
        if($request->hasFile('pic'))
        {
            $upic='user-'.time().'-'.rand(0,99).'.'.$request->pic->extension();
            $request->pic->move(public_path('upload/user/'),$upic);
            $pic_name = 'upload/user/'.$upic;
        }
             $user =User::find(Auth::user()->id)
             ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'pic'=>$pic_name
            ]);
            // dd($user);
            if($user)
            {

                Session::flash('success', 'User Upadated  successfully');
                return redirect()->back();
            }
            else
            {
                Session::flash('error', 'User not Updated');
                return redirect()->back();
            }



    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'=>'required',
            'new_password'=>'required',
            'cnew_password'=>'required'
        ]);
        try
        {
            if($request->new_password == $request->cnew_password)
            {

                if(Hash::check($request->current_password, Auth::user()->password))
                {
                    $res = User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
                    if($res)
                    {
                        session()->flash('success','Password changed Sucessfully');
                        return redirect()->back();
                    }
                    else
                    {
                        session()->flash('error','Password not changed ');
                        return redirect()->back();
                    }
                }
                else
                {
                    session()->flash('error','Incorrect current password');
                    return redirect()->back();
                }
            }
            else
            {
                session()->flash('error','Password did not matched ');
                return redirect()->back();
            }
        }
        catch(Exception $ex)
        {
            $url=URL::current();
            Error::create(['url'=>$url,'message'=>$ex->getMessage()]);
            Session::flash('error','Server Error ');
        }
            return redirect()->back();
    }

    public function lockscreen()
    {
        if(Auth::user()){
            Session::put('user_id', Auth::user()->id);
        }
        $user_id = Session::get('user_id');
        // dd($user_id);
        $user = User::where('id', $user_id)->first();
        Auth::logout();
        return view('admin.auth.lockscreen', compact('user'));
    }
}
