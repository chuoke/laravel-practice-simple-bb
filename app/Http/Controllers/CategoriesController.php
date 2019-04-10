<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function show(Request $request, Category $category)
    {
        $topics = $category->topics()->withOrder($request->order)->with('user', 'category')->paginate(30);

        return view('topics.index', compact('category', 'topics'));
    }
}
