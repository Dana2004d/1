<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    public function index()
    {
        $governorates = Governorate::withCount('locations')
            ->orderBy('id','desc')
            ->paginate(10);

        return view('cms.governorate.index', compact('governorates'));
    }

    public function create()
    {
        return view('cms.governorate.create');
    }

    public function store(Request $request)
    {
        Governorate::create([
            'name'=>$request->name
        ]);

        return response()->json(['icon'=>'success']);
    }

    public function show($id)
    {
        $governorate = Governorate::with('locations')->findOrFail($id);
        return view('cms.governorate.show', compact('governorate'));
    }

    public function edit($id)
    {
        $governorate = Governorate::findOrFail($id);
        return view('cms.governorate.edit', compact('governorate'));
    }

    public function update(Request $request,$id)
    {
        $governorate = Governorate::findOrFail($id);
        $governorate->name = $request->name;
        $governorate->save();

        return ['redirect'=>route('governorates.index')];
    }

    public function destroy($id)
    {
        Governorate::destroy($id);
        return response()->json(['status'=>true]);
    }
    public function trashed()
{
    $governorates = Governorate::onlyTrashed()
        ->withCount('locations')
        ->orderBy('id','desc')
        ->paginate(10);

    return view('cms.governorate.trashed', compact('governorates'));
}
public function restore($id)
{
    Governorate::onlyTrashed()->findOrFail($id)->restore();
    return response()->json(['status'=>true]);
}
public function forceDelete($id)
{
    $governorate = Governorate::onlyTrashed()->findOrFail($id);

    $governorate->locations()->forceDelete(); // مهم
    $governorate->forceDelete();

    return response()->json(['status'=>true]);
}
}
