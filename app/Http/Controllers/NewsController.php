<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\media_mentions;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Show all news
    public function index()
    {
        $query = media_mentions::query()->whereNull('link');

        // Check if there is a search query
        if (request()->has('search')) {
            $search = request()->input('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }

        $news = $query->latest()->paginate(10); // Paginate results
        return view('admin.news.index', compact('news'));
    }

    // Show the create form
    public function create()
    {
        return view('admin.news.create');
    }

    // Store news
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

        $news = new media_mentions();
        $news->title = $request->title;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('news-thumbnails', 'public');
            $news->thumbnail = '/' . $path;
        }

        $news->save();

        return redirect()->route('Admin.news.index')->with('success', 'News created successfully!');
    }
    // Show the edit form
    public function edit($id)
    {
        $news = media_mentions::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    // Update news
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

        $news = media_mentions::findOrFail($id);
        $news->title = $request->title;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($news->thumbnail && Storage::exists($news->thumbnail)) {
                Storage::delete($news->thumbnail);
            }

            // Store new thumbnail
            $path = $request->file('thumbnail')->store('news-thumbnails', 'public');
            $news->thumbnail = '/' . $path;
        }

        $news->save();

        return redirect()->route('Admin.news.index')->with('success', 'News updated successfully!');
    }
    public function destroy($id)
{
    $news = media_mentions::findOrFail($id);

    // Delete the thumbnail if it exists
    if ($news->thumbnail) {
        Storage::disk('public')->delete(str_replace('storage/', '', $news->thumbnail));
    }

    $news->delete();

    // Return JSON for AJAX requests
    if (request()->ajax()) {
        return response()->json(['success' => true, 'message' => 'News deleted successfully!']);
    }

    return redirect()->route('Admin.news.index')->with('success', 'News deleted successfully!');
}

    
}
