<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Governorate;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::with('governorate')
            ->orderBy('id','desc')
            ->paginate(10);

        return view('cms.location.index', compact('locations'));
    }

    public function create()
    {
        $governorates = Governorate::all();
        return view('cms.location.create', compact('governorates'));
    }

    public function store(Request $request)
    {
        Location::create([
            'name'=>$request->name,
            'governorate_id'=>$request->governorate_id
        ]);

        return response()->json(['icon'=>'success']);
    }

    public function show($id)
    {
        $location = Location::findOrFail($id);
        return view('cms.location.show', compact('location'));
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        $governorates = Governorate::all();
        return view('cms.location.edit', compact('location','governorates'));
    }

    public function update(Request $request,$id)
    {
        $location = Location::findOrFail($id);
        $location->name = $request->name;
        $location->governorate_id = $request->governorate_id;
        $location->save();

        return ['redirect'=>route('locations.index')];
    }

    public function destroy($id)
{
    Location::findOrFail($id)->delete();
    return response()->json(['status' => true]);
}
public function trashed()
{
    $locations = Location::onlyTrashed()
        ->with('governorate')
        ->orderBy('id','desc')
        ->paginate(10);

    return view('cms.location.trashed', compact('locations'));
}
public function restore($id)
{
    Location::onlyTrashed()->findOrFail($id)->restore();

    return response()->json(['status' => true]);
}
public function forceDelete($id)
{
    Location::onlyTrashed()->findOrFail($id)->forceDelete();

    return response()->json(['status' => true]);
}
}
