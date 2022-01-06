<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('status',1)->get();

        if($category->all() != null){
            return response()->json($category);

        } else {
            return response()->json(["message"=> "no category found"]);
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
        $this->validate($request, [
            'vehicle_type_id'=>'required',
        ]);
        $category = new Category();

        $category->vehicle_type_id = $request->vehicle_type_id;

        if(isset($request->seat)){
            $category->seat = $request->seat;
        }
        if(isset($request->AC)){
            $category->AC = $request->AC;
        }
        if(isset($request->feet)){
            $category->feet = $request->feet;
        }
        if(isset($request->ton)){
            $category->ton = $request->ton;
        }
        $category->save();

        return 'Category Added Successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        if(isset($category)){
            return response()->json($category);

        } else {
            return response()->json(["message"=> "category not found"]);
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
        $this->validate($request, [
            'vehicle_type_id'=>'required',
        ]);
        $category = Category::find($id);
        
        $category->vehicle_type_id = $request->vehicle_type_id;

        if(isset($request->seat)){
            $category->seat = $request->seat;
        }
        if(isset($request->AC)){
            $category->AC = $request->AC;
        }
        if(isset($request->feet)){
            $category->feet = $request->feet;
        }
        if(isset($request->ton)){
            $category->ton = $request->ton;
        }
        $category->save();

        return 'Category Updated Successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category= Category::find($request->id);
        $category->status = 0;
        $category->save();
        return 'Category Deleted successfully';
    }
}
