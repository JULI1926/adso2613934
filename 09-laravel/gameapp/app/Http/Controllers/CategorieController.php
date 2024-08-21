<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        return view('categories.index')->with('categories',$categories);
    }

    public function show(Category $category)
    {
        //dd($user->toArray());
        return view('categories.show')->with('category',$category);
    }

    public function search(Request $request){
        $categories = Category::names($request->q)->paginate(20);
        return view('categories.search')->with('categories', $categories);        
        //return "Hola";
    }
}
