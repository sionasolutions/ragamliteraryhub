<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('Admin.blog.index', compact('blogs'));
    }
    public function toggleStatus($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = !$blog->status;
        $blog->save();

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function create()
    {
        return view('Admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'date' => 'nullable|date',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'seo_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string|max:500',
        ]);

        // Handle Image Upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        // Handle SEO Thumbnail Upload
        $seoThumbnailPath = null;
        if ($request->hasFile('seo_thumbnail')) {
            $seoThumbnailPath = $request->file('seo_thumbnail')->store('uploads', 'public');
        }

        // Save Blog Data
        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'status' => $request->status,
            'image' => $imagePath,
            'seo_thumbnail' => $seoThumbnailPath,
            'seo_keywords' => $request->seo_keywords,
            'seo_description' => $request->seo_description,
        ]);

        return redirect()->back()->with('success', 'Blog Created Successfully!');
    }

}
