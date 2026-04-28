<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Visitor;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $comments = Comment::with('visitor')->orderBy('id','desc')->paginate(10);
        return response()->view('cms.comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $visitors = Visitor::all();
        return response()->view('cms.comment.create',compact('visitors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'comment_text'=>'required|string',
            'visitor_id'=>'nullable',

        ]);
        if(! $validator->fails()){
            $comments = new Comment();
            $comments ->comment_text = $request->get('comment_text');
            $comments ->visitor_id = $request->get('visitor_id');
            $isSaved = $comments->save();

        return response()->json([
            'icon' => 'success' ,
            'title' => 'Created is Successfully',
        ],200);
        }
         else{
              return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ],400);



    }



        }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comments = Comment::findOrFail($id);
        return response()->view('cms.comment.show',compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visitors = Visitor::all();
        $comments = Comment::findOrFail($id);
        return response()->view('cms.comment.edit',compact('comments','visitors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'comment_text'=>'required|string',
            'visitor_id'=>'nullable',

        ]);
        if(! $validator->fails()){
            $comments = Comment::findOrFail($id);
            $comments ->comment_text = $request->get('comment_text');
            $comments ->visitor_id = $request->get('visitor_id');
            $isSaved = $comments->save();

        return ['redirect'=>route('comments.index')];
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
       $comments = Comment::destroy($id);
    }
}
