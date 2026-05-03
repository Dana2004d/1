<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::with('user.location')
            ->orderBy('id','desc')
            ->paginate(10);

        return view('cms.visitor.index', compact('visitors'));
    }

    public function create()
    {
        $locations = Location::all();
        return view('cms.visitor.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $visitor = new Visitor();
        $visitor->email = $request->email;
        $visitor->password = Hash::make($request->password);

        if($visitor->save()){

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->date = $request->date;
            $user->status = $request->status;
            $user->gender = $request->gender;
            $user->location_id = $request->location_id;

            $user->actor()->associate($visitor);
            $user->save();

            return response()->json([
                'icon'=>'success',
                'title'=>'Visitor Created Successfully'
            ]);
        }

        return response()->json(['icon'=>'error'],400);
    }

    public function show($id)
    {
        $visitor = Visitor::with('user.location')->findOrFail($id);
        return view('cms.visitor.show', compact('visitor'));
    }

    public function edit($id)
    {
        $locations = Location::all();
        $visitor = Visitor::with('user')->findOrFail($id);
        return view('cms.visitor.edit', compact('visitor','locations'));
    }

    public function update(Request $request,$id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->email = $request->email;

        if($request->filled('password')){
            $visitor->password = Hash::make($request->password);
        }

        if($visitor->save()){

            $user = $visitor->user;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->date = $request->date;
            $user->status = $request->status;
            $user->gender = $request->gender;
            $user->location_id = $request->location_id;
            $user->save();

            return ['redirect'=>route('visitors.index')];
        }

        return response()->json(['icon'=>'error'],400);
    }

    public function destroy($id)
    {
        $visitor = Visitor::findOrFail($id);

        if($visitor->user){
            $visitor->user->delete();
        }

        $visitor->delete();

        return response()->json(['status'=>true]);
    }
}
