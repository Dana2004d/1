<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { //$countries = Country::withCount('cities')->orderBy('id','desc')->paginate();
        $governorates = Governorate::withCount('locations')->orderBy('id','desc')->paginate();
        return response()->view('cms.governorate.index',compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.governorate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name'=>'required|string|min:3|max:20',

        ]);
        if($validator->fails()){
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ],400);
        }
        else{
              $governorates = new Governorate();
        $governorates->name = $request->get('name');


        $isSaved = $governorates->save();

        return response()->json([
            'icon' => 'success' ,
            'title' => 'Created is Successfully',
        ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $governorates = Governorate::findOrFail($id);
        return response()->view('cms.governorate.show',compact('governorates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $governorates = Governorate::findOrFail($id);
        return response()->view('cms.governorate.edit',compact('governorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'name'=>'required|string|min:3|max:20',

        ]);
        if(! $validator->fails()){
            $governorates = Governorate::findOrFail($id);
            $governorates->Governorate_name = $request->get('name');


            $isUpdated = $governorates->save();
            return['redirect'=>route('governorates.index')];


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
        $governorates = Governorate::destroy($id);
    }
}
