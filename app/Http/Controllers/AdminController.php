<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::with('user.location')
            ->orderBy('id','desc')
            ->paginate(10);

        return response()->view('cms.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        return response()->view('cms.admin.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ إنشاء الأدمن
        $admin = new Admin();
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        if ($admin->save()) {

            // ✅ إنشاء اليوزر المرتبط
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->date = $request->date;
            $user->status = $request->status;
            $user->gender = $request->gender;
            $user->location_id = $request->location_id;

            // ✅ ربط polymorphic
            $user->actor()->associate($admin);
            $user->save();

            return response()->json([
                'icon' => 'success',
                'title' => 'Admin Created Successfully'
            ], 200);
        }

        return response()->json([
            'icon' => 'error',
            'title' => 'Something went wrong'
        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $admin = Admin::with('user.location')->findOrFail($id);
        return response()->view('cms.admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $locations = Location::all();
        $admin = Admin::with('user')->findOrFail($id);

        return response()->view('cms.admin.edit', compact('admin','locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->email = $request->email;

        // ✅ تحديث كلمة المرور لو تم إدخالها
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        if ($admin->save()) {

            $user = $admin->user;

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->date = $request->date;
            $user->status = $request->status;
            $user->gender = $request->gender;
            $user->location_id = $request->location_id;

            $user->save();

            return ['redirect' => route('admins.index')];
        }

        return response()->json([
            'icon' => 'error',
            'title' => 'Update Failed'
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        // ✅ حذف اليوزر المرتبط أولاً
        if ($admin->user) {
            $admin->user->delete();
        }

        $admin->delete();

        return response()->json(['status' => true]);
    }
    public function trashed()
{
    $admins = Admin::onlyTrashed()
        ->with('user.location')
        ->orderBy('id','desc')
        ->get();

    return view('cms.admin.trashed', compact('admins'));
}
public function restore($id)
{
    $admin = Admin::withTrashed()->findOrFail($id);
    $admin->restore();

    return redirect()->route('admins.trashed');
}
public function forceDelete($id)
{
    $admin = Admin::withTrashed()->findOrFail($id);

    if ($admin->user) {
        $admin->user->forceDelete();
    }

    $admin->forceDelete();

    return redirect()->route('admins.trashed');
}
}
