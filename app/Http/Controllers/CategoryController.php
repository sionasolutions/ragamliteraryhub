<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::all();

        if ($request->has('search')) {
            $categories = Categories::where('name', 'LIKE', "%{$_REQUEST['search']}%")->get();
        }

        return view('Admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Categories::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('Admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        if ($category) {
            return response()->json(['success' => true, 'name' => $category->name]);
        } else {
            return response()->json(['success' => false, 'message' => 'Category not found.'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Categories::find($id);
        if ($category) {

            $category->name = $request->input('name');

            $category->save();
            return redirect()->route('Admin.categories.index')
                ->with('success', 'Category updated successfully.');
        } else {
            return redirect()->route('Admin.categories.index')
                ->with('error', 'Category not found.');
        }
    }
    // In CategoryController.php
    public function destroy($id)
    {
        try {
            Categories::destroy($id);
            return response()->json(['message' => 'Category deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unable to delete category.'], 500);
        }
    }
}
