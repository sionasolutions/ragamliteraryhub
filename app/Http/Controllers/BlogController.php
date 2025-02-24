<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

        // Check if there is a search query
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }

        $blogs = $query->latest()->paginate(10); // Paginate results
        return view('Admin.blog.index', compact('blogs'));
    }
    public function toggleStatus(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = $request->status;
        $blog->save();

        // Flashing toastr success message to the session
        session()->flash('toastr', [
            'type' => 'success',
            'message' => 'Blog Status Updated Successfully!'
        ]);

        return response()->json([
            'success' => true,
            'status' => $blog->status
        ]);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
            'seo_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string|max:500',
        ]);

        // Handle Image Upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        // Handle SEO Thumbnail Upload
        $seoThumbnailPath = null;
        if ($request->hasFile('seo_thumbnail')) {
            $seoThumbnailPath = $request->file('seo_thumbnail')->store('seo', 'public');
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

        return redirect()->route('Admin.blog.index')->with('success', 'Blog Created Successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'date' => 'nullable|date',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
            'seo_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string|max:500',
        ]);

        // Find the blog post
        $blog = Blog::findOrFail($id);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        // Handle SEO Thumbnail Upload
        if ($request->hasFile('seo_thumbnail')) {
            if ($blog->seo_thumbnail) {
                Storage::disk('seo')->delete($blog->seo_thumbnail);
            }
            $blog->seo_thumbnail = $request->file('seo_thumbnail')->store('uploads', 'public');
        }

        // Update Blog Data
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'status' => $request->status,
            'seo_keywords' => $request->seo_keywords,
            'seo_description' => $request->seo_description,
        ]);

        return redirect()->route('Admin.blog.index')->with('success', 'Blog Updated Successfully!');
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('Admin.blog.edit', compact('blog'));
    }

    public function archived()
    {
        $archivedBlogs = Blog::onlyTrashed()->latest()->paginate(10);
        return view('Admin.blog.archived', compact('archivedBlogs'));
    }

    public function destroy($id)
    {
        if (request()->isMethod('delete')) {
            $blog = Blog::findOrFail($id);
            $blog->delete();
            return response()->json(['success' => 'Blog Deleted Successfully!']);
        }
        return response()->json(['error' => 'Invalid request'], 405);
    }



    public function restore($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);
        $blog->restore();
        return redirect()->back()->with('success', 'Blog Restored Successfully!');
    }

    public function forceDelete($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);

        if ($blog->image) {
            Storage::delete($blog->image);
        }

        $blog->forceDelete();
        return redirect()->back()->with('success', 'Blog Permanently Deleted Successfully!');
    }

    public function blogs()
    {
        $blogs = Blog::where('status', 1)->latest()->paginate(10);
        return view('User.blog.blogview', compact('blogs'));
    }

    public function blog($slug)
    {
        $blog = Blog::where('slug',$slug)->firstOrFail();
        return view('User.blog.show', compact('blog'));
    }
}
