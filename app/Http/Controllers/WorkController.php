<?php

namespace App\Http\Controllers;
use App\Models\Works;
use Illuminate\Support\Str;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index(Request $request)
    {
        $query = Works::query();
        $works = $query->latest()->paginate(10);
        return view('Admin.works.index', compact('works'));
    }
    public function create()
    {
        $categories = Categories::all();
        return view('Admin.works.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
            'seo_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'is_active' => 'required|boolean',
        ]);

        $work = new Works();
        $work->title = $request->title;
        $work->description = $request->description;
        $work->category_id = $request->category_id;
        $work->is_active = $request->is_active;



        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('works', 'public');
            $work->image_path = $imagePath;
        }

        if ($request->hasFile('seo_thumbnail')) {
            $seoThumbnail = $request->file('seo_thumbnail');
            $seoThumbnailPath = $seoThumbnail->store('seo', 'public');
            $work->seo_thumbnail = $seoThumbnailPath;
        }

        $work->seo_keywords = $request->seo_keywords;
        $work->seo_description = $request->seo_description;
        $work->save();


        return redirect()->route('Admin.works.index')->with('success', 'Work Created Successfully!');
    }


    public function update(Request $request, Works $work)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
            'seo_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'is_active' => 'required|boolean',
        ]);

        $work->title = $request->title;
        $work->description = $request->description;
        $work->category_id = $request->category_id;
        $work->is_active = $request->is_active;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('works', 'public');
            $work->image_path = $imagePath;
        }

        if ($request->hasFile('seo_thumbnail')) {
            $seoThumbnail = $request->file('seo_thumbnail');
            $seoThumbnailPath = $seoThumbnail->store('seo', 'public');
            $work->seo_thumbnail = $seoThumbnailPath;
        }

        $work->seo_keywords = $request->seo_keywords;
        $work->seo_description = $request->seo_description;
        $work->save();


        return redirect()->route('Admin.works.index')->with('success', 'Work Updated Successfully!');
    }


    public function toggleStatus(Request $request, Works $work)
    {
        try {
            $validated = $request->validate([
                'is_active' => 'required|boolean'
            ]);

            $work->update(['is_active' => $validated['is_active']]);

            return response()->json([
                'success' => true,
                'status' => $work->is_active
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Status update failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function allCategories()
    {
        $categories = Categories::all();
        return view('User.works.all-categories', compact('categories'));
    }

    public function work($slug)
    {
        // Fetch category
        $category = Categories::where('slug', $slug)->first();

        if (!$category) {
            abort(404, 'Category not found');
        }

        // Fetch works under this category
        $works = Works::where('category_id', $category->id)->get();

        return view('User.works.category', compact('works', 'category'));
    }

    public function show($categorySlug, $workSlug)
    {
        $category = Categories::where('slug', $categorySlug)->first();
        $work = Works::where('slug', $workSlug)->first();

        if (!$category || !$work) {
            abort(404, 'Work not found');
        }

        // Fetch related works in the same category (excluding the current work)
        $relatedWorks = Works::where('category_id', $category->id)
            ->where('id', '!=', $work->id)
            ->get();

        return view('User.works.show', compact('work', 'category', 'relatedWorks'));
    }

    public function edit(Works $work)
    {
        $categories = Categories::all();
        return view('Admin.works.edit', compact('work', 'categories'));
    }

    public function destroy($id)
    {
        if (request()->isMethod('delete')) {
            $work = Works::findOrFail($id);
            $work->delete();
            return response()->json(['success' => 'Work Deleted Successfully!']);
        }
        return response()->json(['error' => 'Invalid request'], 405);
    }

    // WorkController.php
    public function archived()
    {
        $works = Works::onlyTrashed()
            ->with('category')
            ->latest('deleted_at')
            ->paginate(10);

        return view('Admin.works.archived', compact('works'));
    }

    public function restore($id)
    {
        $work = Works::withTrashed()->findOrFail($id);
        $work->restore();

        return response()->json(['message' => 'Work restored successfully']);
    }

    public function forceDelete($id)
    {
        $work = Works::withTrashed()->findOrFail($id);

        // Delete associated file
        Storage::delete($work->image_path);

        $work->forceDelete();

        return response()->json(['message' => 'Work permanently deleted']);
    }
}