<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(2);
        return view('cms.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('cms.categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->only(['name','description','status','links']));
        return response()->json(['icon'=>'success']);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('cms.categories.edit', compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->only(['name','description','status','links']));

        return ['redirect'=>route('categories.index')];
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return response()->json(['status'=>true]);
    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->paginate(10);
        return view('cms.categories.trashed', compact('categories'));
    }

    public function restore($id)
    {
        Category::onlyTrashed()->findOrFail($id)->restore();
        return response()->json(['status'=>true]);
    }
}
