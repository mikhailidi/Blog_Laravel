<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // validate data
        $this->validate($request, [
            'name' => 'required|unique:categories|max:255',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success_form', 'Category was successfully saved');


        // redirect to another page
        return redirect()->route('category.create');
    }
}
