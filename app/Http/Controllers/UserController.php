<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'fullname'=>['required'],
        //     'username'=>['required'],
        //     'email'=> ['required','email'],
        //     'mobile_number'=>['required'],
        //     'urgent_mobile_number'=>['required'],
        //     'nid_card_number'=>['required'],
        //     'password'=>['required', 'string', 'min:8','confirmed'],
        // ]);
        
        $user =new User();
        
        $user->role_id = $request->role_id;
        $user->photo = $request->photo;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->urgent_mobile_number = $request->urgent_mobile_number;
        $user->nid_card_number = $request->nid_card_number;
        $user->password = Hash::make($request->password);
        // $user->creator = Auth::user()->id; 
        $user -> save();

        $user -> slug =  $user->id.uniqid(10);
        $user -> save();

        if($request->hasFile('photo')){
            $user->photo = Storage::put('/uploads/user',$request->file('photo'));
            $user->save();
        }

        return 'user Saved Successfully';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
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

        // dd($request->all());
        // $this->validate($request, [
        //     'fullname'=>['required'],
        //     'username'=>['required'],
        //     'email'=> ['required','email'],
        //     'mobile_number'=>['required'],
        //     'urgent_mobile_number'=>['required'],
        //     'nid_card_number'=>['required'],
        //     'password'=>['required', 'string', 'min:8','confirmed'],
        // ]);
        
        $user = User::find($id);
        
        $user->role_id = $request->role_id;
        $user->photo = $request->photo;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->urgent_mobile_number = $request->urgent_mobile_number;
        $user->nid_card_number = $request->nid_card_number;
        $user->password = Hash::make($request->password);
        // $user->creator = Auth::user()->id; 
        $user -> save();

        $user -> slug =  $user->name.uniqid(10);
        $user -> save();

        if($request->hasFile('photo')){
            $user->photo = Storage::put('uploads/user',$request->file('photo'));
            $user->save();
        }

        return 'user Updated Successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user  = User::find($request->id);
        $user->status = 0;
        $user->save();
    }
}
