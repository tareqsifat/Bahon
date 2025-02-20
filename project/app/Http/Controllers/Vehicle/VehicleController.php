<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Models\vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = vehicle::where('status', 1)->get();

        if($vehicle->all() != null){
            return response()->json($vehicle);

        } else {
            return response()->json(["message"=> "no vehicle found"]);
        }
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
            'vehicle_type_id'=> ['required'],
            'road_permit_no'=>['required'],
            'chesis_no'=>['required'],
            'vehicle_owner_id'=>['required']
        ]);

        $vehicle = new vehicle();

        $vehicle->vehicle_type_id = $request->vehicle_type_id;
        $vehicle->road_permit_no = $request->road_permit_no;
        $vehicle->chesis_no = $request->chesis_no;
        $vehicle->vehicle_owner_id = $request->vehicle_owner_id;
        $vehicle->creator = 1;
        $vehicle->slug = $request->road_permit_no . Str::random(10);
        
        $vehicle->save();

        return 'vehicle Added Successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = vehicle::find($id);

        if($vehicle->all() != null){
            return response()->json($vehicle);

        } else {
            return response()->json(["message"=> "no vehicle found"]);
        }
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
            'vehicle_type_id'=> ['required'],
            'road_permit_no'=>['required'],
            'chesis_no'=>['required'],
            'vehicle_owner_id'=>['required']
        ]);

        $vehicle = vehicle::find($id);

        if(isset($request->vehicle_type_id)){
            $vehicle->vehicle_type_id = $request->vehicle_type_id;
        }
        if(isset($request->road_permit_no)){
            $vehicle->road_permit_no = $request->road_permit_no;
        }
        if(isset($request->chesis_no)){
            $vehicle->chesis_no = $request->chesis_no;
        }
        if(isset($request->vehicle_owner_id)){
            $vehicle->vehicle_owner_id = $request->vehicle_owner_id;
        }

        $vehicle->creator = 1;
        $vehicle->slug = $request->road_permit_no . Str::random(10);
        
        $vehicle->save();

        return 'vehicle Added Successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $vehicle = vehicle::find($request->id);
        $vehicle->status = 0;
        $vehicle->save();

        return 'vehicle Added Successfully';
    }
}
