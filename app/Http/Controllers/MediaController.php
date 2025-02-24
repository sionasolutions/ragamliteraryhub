<?php

namespace App\Http\Controllers;

use App\Models\media_mentions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{

    public function index()
    {
        $media = media_mentions::query()->whereNotNull('link');

        if (request()->has('search')) {
            $search = request()->input('search');
            $media->where('title', 'LIKE', "%{$search}%");
        }

        $media = $media->latest()->paginate(10);

        return view('admin.media.index', compact('media'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function edit($id)
    {
        $media = media_mentions::findOrFail($id);

        return view('admin.media.edit', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required|url'
        ]);

        // Handle File Upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('media', 'public');
        } else {
            $thumbnailPath = null;
        }

        // Create Media News
        $media = media_mentions::create([
            'title' => $request->title,
            'thumbnail' => $thumbnailPath ? $thumbnailPath : null,
            'link' => $request->link,
        ]);

        return redirect()->route('Admin.media.index')->with('success', 'News created successfully!');
    }

    public function update(Request $request, $id)
    {
        $news = media_mentions::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'link' => 'nullable|url',  // Validate URL format
        ]);

        // Update title and link
        $news->title = $request->title;
        $news->link = $request->link;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail && Storage::exists($news->thumbnail)) {
                Storage::delete( $news->thumbnail);
            }
            $news->thumbnail = $request->file('thumbnail')->store('media', 'public');
        }

        $news->save();

        return redirect()->route('Admin.media.index')->with('success', 'Media updated successfully.');
    }

    public function destroy($id)
    {
        $news = media_mentions::findOrFail($id);

        if ($news->thumbnail && Storage::exists('storage/' . $news->thumbnail)) {
            Storage::delete('/' . $news->thumbnail);
        }

        $news->delete();

        return redirect()->route('Admin.media.index')->with('success', 'Media deleted successfully.');
    }

}
