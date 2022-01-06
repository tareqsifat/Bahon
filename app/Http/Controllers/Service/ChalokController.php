<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Driver;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChalokController extends Controller
{
    public function index()
    {
        $driver = Driver::where('status', 1)->get();

        if($driver->all() != null){
            return response()->json($driver);

        } else {
            return response()->json(["message"=> "no driver found"]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id'=>['required'],
            'driving_license_no'=>['required'],
            'driving_license_front'=>['required'],
            'driving_license_back'=>['required'],
            'date_of_birth'=>['required'],
            'height'=>['required'],
        ]);
        $driver = new Driver();

        $driver->user_id = $request->user_id;
        $driver->confirmed = 1;
        $driver->driving_license_no = $request->driving_license_no;
        $driver->date_of_birth = $request->date_of_birth;
        $driver->height = $request->height;
        $driver->slug = $request->user_id . Str::random(10);
        $driver->status = 1;
        
        $driver->save();

        if ($request->hasFile('driving_license_front')) {
            $driver->driving_license_front = Storage::put('uploads/driver', $request->file('driving_license_front'));
            $driver->save();
        }

        if ($request->hasFile('driving_license_back')) {
            $driver->driving_license_back = Storage::put('uploads/driver', $request->file('driving_license_back'));
            $driver->save();
        }

        return 'Driver Added Successfully';
    }

    public function show($id)
    {
        $driver =  Driver::find($id);

        if(isset($driver)){
            return response()->json($driver);

        } else {
            return response()->json(["message"=> "no driver found"]);
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'user_id'=>['required'],
            'driving_license_no'=>['required'],
            'driving_license_front'=>['required'],
            'driving_license_back'=>['required'],
            'date_of_birth'=>['required'],
            'height'=>['required'],
        ]);
        $driver = Driver::find($id);

        $driver->user_id = $request->user_id;
        $driver->confirmed = 1;
        $driver->driving_license_no = $request->driving_license_no;
        $driver->date_of_birth = $request->date_of_birth;
        $driver->height = $request->height;
        $driver->slug = $request->user_id . Str::random(10);
        $driver->status = 1;
  
        $driver->save();

        if ($request->hasFile('driving_license_front')) {
            $driver->driving_license_front = Storage::put('uploads/driver', $request->file('driving_license_front'));
            $driver->save();
        }

        if ($request->hasFile('driving_license_back')) {
            $driver->driving_license_back = Storage::put('uploads/driver', $request->file('driving_license_back'));
            $driver->save();
        }

        return 'Driver Updated Successfully';
    }

    public function destroy(Request $request)
    {
        $driver = Driver::find($request->id);
        $driver->status = 0;
        $driver->save();

        return 'Driver Deleted Successfully';
    }

    public function confirmation($id)
    {
        $driver = Driver::find($id);
        $driver->confirmed = 1;
        $driver->save();

        return 'Driver Confirmed Successfully';
    }

    public function ban($id)
    {
        $driver = Driver::find($id);
        if(!$driver->banned){
            $driver->banned = 1;
            $driver->save();
            return 'Driver banned Successfully';
        }
        else{
            $driver->banned = 0;
            $driver->save();
            return 'ban Removed Successfully';
        }
    }

    public function chalok()
    {
        $driver = Driver::where('status',1)->where('confirmed',1)->where('banned',0)->get();

        if($driver->all() != null){
            return response()->json($driver);

        } else {
            return response()->json(["message"=> "No activated driver found"]);
        }
    }

    public function banned()
    {
        $driver = Driver::where('status',1)->where('confirmed',1)->where('banned',1)->get();

        if($driver->all() != null){
            return response()->json($driver);

        } else {
            return response()->json(["message"=> "No banned driver found"]);
        }
    }
}
