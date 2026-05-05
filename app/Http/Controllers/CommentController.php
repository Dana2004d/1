<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Visitor;
use Illuminate\Http\Request;

class CommentController extends Controller
{
 public function index()
{
    $comments = Comment::with('visitor.user')
        ->whereNull('deleted_at')
        ->orderBy('id','desc')
        ->paginate(10);

    return view('cms.comment.index', compact('comments'));
}

    public function create()
    {
        $visitors = Visitor::with('user')->get();
        return view('cms.comment.create', compact('visitors'));
    }

    public function store(Request $request)
    {
        Comment::create([
            'comment_text'=>$request->comment_text,
            'visitor_id'=>$request->visitor_id
        ]);

        return response()->json(['icon'=>'success']);
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('cms.comment.show', compact('comment'));
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $visitors = Visitor::with('user')->get();
        return view('cms.comment.edit', compact('comment','visitors'));
    }

    public function update(Request $request,$id)
    {
        $comment = Comment::findOrFail($id);
        $comment->comment_text = $request->comment_text;
        $comment->visitor_id = $request->visitor_id;
        $comment->save();

        return ['redirect'=>route('comments.index')];
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        return response()->json(['status'=>true]);
    }
    public function trashed()
{
    $comments = Comment::onlyTrashed()
        ->with('visitor.user')
        ->orderBy('id','desc')
        ->paginate(10);

    return view('cms.comment.trashed', compact('comments'));
}

    public function restore($id)
    {
        Comment::withTrashed()->findOrFail($id)->restore();
        return response()->json(['status'=>true]);
    }

    public function forceDelete($id)
    {
        Comment::withTrashed()->findOrFail($id)->forceDelete();
        return response()->json(['status'=>true]);
    }
}
