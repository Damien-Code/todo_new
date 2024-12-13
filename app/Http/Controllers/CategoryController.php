<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\CannotCloneTestDoubleForReadonlyClassException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userid = auth()->id();
        $categories = Category::where('user_id', $userid)->get();

        $totalCategories = count($categories);
        // check if there is a search
        // if there is, check the search value with db
        if(request()->has('search')) {
            $search = request()->get('search');
            $categories = Category::where('category', 'LIKE', '%' . $search . '%')->get();
        }

        return view('category.index', compact('categories', 'totalCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|max:48',
            'color' => 'required'
        ]);
        Category::create([
            'user_id' => auth()->id(),
            'category' => $request->get('category'),
            'color' => $request->get('color')
        ]);

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $todos = $category->todos()->get();
        return view('category.show', ['todos' => $todos, 'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'category' => 'required|max:48',
            'color' => 'required'
        ]);
        $category->update($validatedData);
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'));
    }
}
