<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::with('governorate')->orderBy('id','desc')->paginate(10);
        return response()->view('cms.location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $governorates = Governorate::all();
        return response()->view('cms.location.create',compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name'=>'required|string|min:3|max:20',
            'governorate_id'=>'nullable',

        ]);
        if(! $validator->fails()){
            $locations = new Location();
            $locations ->name = $request->get('name');
            $locations ->governorate_id = $request->get('governorate_id');
            $isSaved = $locations->save();

        return response()->json([
            'icon' => 'success' ,
            'title' => 'Created is Successfully',
        ],200);
        }
         else{
              return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ],400);



    }



        }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $locations = Location::findOrFail($id);
        return response()->view('cms.location.show',compact('locations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $governorates = Governorate::all();
        $locations = Location::findOrFail($id);
        return response()->view('cms.location.edit',compact('locations','governorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'name'=>'required|string|min:3|max:20',
            'governorate_id'=>'nullable',

        ]);
        if(! $validator->fails()){
            $locations = Location::findOrFail($id);
            $locations ->name = $request->get('name');
            $locations ->governorate_id = $request->get('governorate_id');
            $isSaved = $locations->save();

        return ['redirect'=>route('locations.index')];
        }
         else{
              return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ],400);



    }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $locations = Location::destroy($id);
    }
}

