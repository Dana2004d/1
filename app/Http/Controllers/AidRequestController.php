<?php

namespace App\Http\Controllers;

use App\Models\AidRequest;
use App\Models\Visitor;
use App\Models\Category;
use Illuminate\Http\Request;

class AidRequestController extends Controller
{
    public function index()
    {
        $aid_requests = AidRequest::with('visitors')->latest()->paginate(10);
        return view('cms.aid_requests.index', compact('aid_requests'));
    }

    public function create()
    {
        $visitors = Visitor::with('user')->get();
        $categories = Category::all();
        return view('cms.aid_requests.create', compact('visitors','categories'));
    }

    public function store(Request $request)
    {
        $aid = AidRequest::create($request->only([
            'name','phone','company_name','aid_type','link','notes','category_id'
        ]));

        $aid->visitors()->attach($request->visitors ?? []);

        return redirect()->route('aid_requests.index');
    }

    public function show($id)
    {
        $aid_request = AidRequest::with('visitors.user')->findOrFail($id);
        return view('cms.aid_requests.show', compact('aid_request'));
    }

    public function edit($id)
    {
        $aid_request = AidRequest::with('visitors')->findOrFail($id);
        $visitors = Visitor::with('user')->get();
        $categories = Category::all();

        return view('cms.aid_requests.edit', compact('aid_request','visitors','categories'));
    }

    public function update(Request $request,$id)
    {
        $aid = AidRequest::findOrFail($id);

        $aid->update($request->only([
            'name','phone','company_name','aid_type','link','notes','category_id'
        ]));

        $aid->visitors()->sync($request->visitors ?? []);

        return redirect()->route('aid_requests.index');
    }

    public function destroy($id)
    {
        AidRequest::findOrFail($id)->delete();
        return response()->json(['status'=>true]);
    }

    public function trashed()
    {
        $aid_requests = AidRequest::onlyTrashed()->get();
        return view('cms.aid_requests.trashed', compact('aid_requests'));
    }

    public function restore($id)
    {
        AidRequest::withTrashed()->findOrFail($id)->restore();
        return back();
    }

    public function forceDelete($id)
    {
        AidRequest::withTrashed()->findOrFail($id)->forceDelete();
        return back();
    }
}
