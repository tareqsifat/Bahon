<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VehicleType::where('status', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required'
        ]);

        $v_type = new VehicleType();
        $v_type->name = $request->name;
        $v_type->creator = 1;
        $v_type->slug = Str::slug($request->name);
        $v_type->status = 1;
        $v_type->save();

        return 'VehicleType Added Successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return VehicleType::find($id);
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
        $this->validate($request, [
            'name'=> 'required'
        ]);

        $v_type =VehicleType::find($id);
        $v_type->name = $request->name;
        $v_type->creator = 1;
        $v_type->slug = Str::slug($request->name);
        $v_type->save();
        
        return 'VehicleType Updated Successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $v_type = VehicleType::find($request->id);
        $v_type->status = 0;
        $v_type->save();
    }
}
