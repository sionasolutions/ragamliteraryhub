<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        // Check if there is a search query
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }

        $books = $query->latest()->paginate(10); // Paginate results
        return view('Admin.book.index', compact('books'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->status = $request->status;
        $book->save();

        // Flashing toastr success message to the session
        session()->flash('toastr', [
            'type' => 'success',
            'message' => 'Book Status Updated Successfully!'
        ]);

        return response()->json([
            'success' => true,
            'status' => $book->status
        ]);
    }


    public function create()
    {
        return view('Admin.book.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'date' => 'nullable|date',
                'status' => 'required|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
                'content' => 'required',
                'seo_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'seo_keywords' => 'nullable|string',
                'seo_description' => 'nullable|string|max:500',

            ]);

            // Handle Cover Image Upload
            $coverImagePath = null;
            if ($request->hasFile('cover_image')) {
                $coverImagePath = $request->file('cover_image')->store('books', 'public');
            }

            // Handle SEO Thumbnail Upload
            $seoThumbnailPath = null;
            if ($request->hasFile('seo_thumbnail')) {
                $seoThumbnailPath = $request->file('seo_thumbnail')->store('seo', 'public');
            }

            // Save Book Data
            Book::create([
                'title' => $request->title,
                'date' => $request->publication_date,
                'status' => $request->status,
                'image' => $coverImagePath,
                'content' => $request->content,
                'seo_thumbnail' => $seoThumbnailPath,
                'seo_keywords' => $request->seo_keywords,
                'seo_description' => $request->seo_description,
            ]);

            return redirect()->route('Admin.book.index')->with('success', 'Book Created Successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput()->with('error', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('Admin.book.edit', compact('book'));
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

        // Find the book
        $book = Book::findOrFail($id);

        // Handle Cover Image Upload
        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $book->cover_image = $request->file('cover_image')->store('books', 'public');
        }

        // Handle SEO Thumbnail Upload
        if ($request->hasFile('seo_thumbnail')) {
            if ($book->seo_thumbnail) {
                Storage::disk('seo')->delete($book->seo_thumbnail);
            }
            $book->seo_thumbnail = $request->file('seo_thumbnail')->store('uploads', 'public');
        }

        // Update Book Data
        $book->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'status' => $request->status,
            'seo_keywords' => $request->seo_keywords,
            'seo_description' => $request->seo_description,
        ]);

        return redirect()->route('Admin.book.index')->with('success', 'Book Updated Successfully!');
    }

    public function archived()
    {
        $archivedBooks = Book::onlyTrashed()->latest()->paginate(10);
        return view('Admin.book.archived', compact('archivedBooks'));
    }

    public function destroy($id)
    {
        if (request()->isMethod('delete')) {
            $book = Book::findOrFail($id);
            $book->delete();
            return response()->json(['success' => 'Book Deleted Successfully!']);
        }
        return response()->json(['error' => 'Invalid request'], 405);
    }

    public function restore($id)
    {
        $book = Book::withTrashed()->findOrFail($id);
        $book->restore();
        return redirect()->back()->with('success', 'Book Restored Successfully!');
    }

    public function forceDelete($id)
    {
        $book = Book::withTrashed()->findOrFail($id);

        if ($book->cover_image) {
            Storage::delete($book->cover_image);
        }

        $book->forceDelete();
        return redirect()->back()->with('success', 'Book Permanently Deleted Successfully!');
    }
}
