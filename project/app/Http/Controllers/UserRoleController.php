<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserRole::where('status',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'serial'=> ['required', 'numeric'],
        ]);

        $role = new UserRole();

        $role->name = $request->name;
        $role->serial = $request->serial;
        // $role->creator = Auth::user()->id;
        $role->slug = Str::slug($request->name);
        $role->save();

        return 'UserRole Created Successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return UserRole::find($id);
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
        $this->validate($request,[
            'name'=> 'required',
            'serial'=> ['required', 'numeric'],
        ]);

        $role = UserRole::find($id);

        $role->name = $request->name;
        $role->serial = $request->serial;
        // $role->creator = Auth::user()->id;
        $role->slug = Str::slug($request->name);
        $role->save();

        return 'UserRole Updated Successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $role = UserRole::find($request->id);
        $role->status = 0;
        $role->save();
    }
}
