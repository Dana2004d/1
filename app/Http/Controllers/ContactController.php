<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Visitor;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('visitor')
            ->orderBy('id','desc')
            ->paginate(10);

        return view('cms.contact.index', compact('contacts'));
    }

    public function create()
    {
        $visitors = Visitor::all();
        return view('cms.contact.create', compact('visitors'));
    }

    public function store(Request $request)
    {
        Contact::create([
            'message_type' => $request->message_type,
            'message' => $request->message,
            'visitor_id' => $request->visitor_id
        ]);

        return response()->json([
            'icon'=>'success',
            'title'=>'Message Created Successfully'
        ]);
    }

    public function show($id)
    {
        $contact = Contact::with('visitor')->findOrFail($id);
        return view('cms.contact.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $visitors = Visitor::all();

        return view('cms.contact.edit', compact('contact','visitors'));
    }

    public function update(Request $request,$id)
    {
        $contact = Contact::findOrFail($id);

        $contact->update([
            'message_type' => $request->message_type,
            'message' => $request->message,
            'visitor_id' => $request->visitor_id
        ]);

        return response()->json([
            'redirect'=>route('contacts.index')
        ]);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return response()->json(['status'=>true]);
    }

    public function trashed()
    {
        $contacts = Contact::onlyTrashed()->with('visitor')->paginate(10);
        return view('cms.contact.trashed', compact('contacts'));
    }

    public function restore($id)
    {
        Contact::onlyTrashed()->findOrFail($id)->restore();
        return response()->json(['status'=>true]);
    }
    public function forceDelete($id)
{
    Contact::onlyTrashed()->findOrFail($id)->forceDelete();
    return response()->json(['status'=>true]);
}

}
