<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\media_mentions;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        $news = media_mentions::query()->whereNull('link')
            ->latest()
            ->take(3)
            ->get();

        return view('welcome', compact('blogs','news'));
    }
}
