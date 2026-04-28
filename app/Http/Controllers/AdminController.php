<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $admins = Admin::orderBy('id','desc')->paginate(10);
        return response()->view('cms.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        return response()->view('cms.admin.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validator = Validator($request->all(), [

    ]);

    if (! $validator->fails()) {
      $admins = new Admin();
    $admins->email = $request->get('email');
    $admins->password = $request->get('password');

    $isSaved = $admins->save();

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

        $users->actor()->associate($admins);

        $isSaved = $users->save();

        return response()->json([
            'icon' => 'success',
            'title' => 'Created Admin is Successfully',
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
        $admins = Admin::findOrFail($id);
        return response()->view('cms.admin.show',compact('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $locations = Location::all();
        $admins = Admin::findOrFail($id);
        return response()->view('cms.admin.edit',compact('admins','locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validator = Validator($request->all(), [

    ]);

    if (! $validator->fails()) {
      $admins = Admin::findOrFail($id);
    $admins->email = $request->get('email');
    // $admins->password = $request->get('password');

    $isSaved = $admins->save();

    if ($isSaved) {

        $users = $admins->user;
        $users->first_name = $request->get('first_name');
        $users->last_name = $request->get('last_name');
        $users->mobile = $request->get('mobile');
        $users->address = $request->get('address');
        $users->date = $request->get('date');
        $users->status = $request->get('status');
        $users->gender = $request->get('gender');
        $users->location_id = $request->get('location_id');

        $users->actor()->associate($admins);

        $isSaved = $users->save();

        return ['redirect'=>route('admins.index')];

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
        $admins = Admin::destroy($id);
    }
}
