<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitors = Visitor::orderBy('id','desc')->paginate(10);
        return response()->view('cms.visitor.index',compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        return response()->view('cms.visitor.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validator = Validator($request->all(), [

    ]);

    if (! $validator->fails()) {
      $visitors = new visitor();
    $visitors->email = $request->get('email');
    $visitors->password = $request->get('password');

    $isSaved = $visitors->save();

    if ($isSaved) {

        $users = new User();
        $users->first_name = $request->get('first_name');
        $users->last_name = $request->get('last_name');
        $users->mobile = $request->get('mobile');
        $users->address = $request->get('address');
        $users->date = $request->get('date');
        $users->status = $request->get('status');
        $users->gender = $request->get('gender');
        $users->location_id = $request->get('location_id');

        $users->actor()->associate($visitors);

        $isSaved = $users->save();

        return response()->json([
            'icon' => 'success',
            'title' => 'Created visitor is Successfully',
        ], 200);

    } else {
        return response()->json([
            'icon' => 'error',
            'title' => $validator->getMessageBag()->first(),
        ], 400);
    }

    }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $visitors = visitor::findOrFail($id);
        return response()->view('cms.visitor.show',compact('visitors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $locations = Location::all();
        $visitors = visitor::findOrFail($id);
        return response()->view('cms.visitor.edit',compact('visitors','locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validator = Validator($request->all(), [

    ]);

    if (! $validator->fails()) {
      $visitors = visitor::findOrFail($id);
    $visitors->email = $request->get('email');
    // $visitors->password = $request->get('password');

    $isSaved = $visitors->save();

    if ($isSaved) {

        $users = $visitors->user;
        $users->first_name = $request->get('first_name');
        $users->last_name = $request->get('last_name');
        $users->mobile = $request->get('mobile');
        $users->address = $request->get('address');
        $users->date = $request->get('date');
        $users->status = $request->get('status');
        $users->gender = $request->get('gender');
        $users->location_id = $request->get('location_id');

        $users->actor()->associate($visitors);

        $isSaved = $users->save();

        return ['redirect'=>route('visitors.index')];

    } else {
        return response()->json([
            'icon' => 'error',
            'title' => $validator->getMessageBag()->first(),
        ], 400);
    }

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $visitors = visitor::destroy($id);
    }
}
