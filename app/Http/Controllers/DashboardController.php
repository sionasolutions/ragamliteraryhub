<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Book;
use App\Models\media_mentions;
class DashboardController extends Controller
{
    public function index()
    {
        $blogs = Blog::count();
        $books= Book::count();
        $news = media_mentions::whereNull('link')->count();
        $media = media_mentions::whereNotNull('link')->count();

        return view('Admin.dashboard',compact('blogs','books','news','media'))->with('title', 'Dashboard');
    } 
}
