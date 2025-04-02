<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\media_mentions;
use App\Mail\ContactMail;
use App\Models\Book;
use App\Models\Categories;
use Illuminate\Support\Facades\Mail;

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

        $books = Book::whereNotNull('image')->latest()->take(3)->get();

        $categories = Categories::get()->take(4);
        return view('welcome', compact('blogs', 'news','books','categories'));
    }

    public function email(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Log data for debugging
        \Log::info('Email function reached');
        \Log::info('Email Data: ' . json_encode($data));

        try {
            // Send Email
            Mail::to('rohanaaron16@gmail.com')->send(new ContactMail($data));
            \Log::info('Email Sent Successfully');

            // Return JSON success response
            return response()->json(['success' => true, 'message' => 'Your message has been sent successfully!']);
        } catch (\Exception $e) {
            \Log::error('Email Sending Failed: ' . $e->getMessage());

            // Return JSON error response
            return response()->json(['success' => false, 'message' => 'Failed to send email. Please try again.'], 500);
        }
    }

    //     public function email(Request $request)
// {
//     \Log::info('Email function reached'); // Log this message

    //     $data = [
//         'name' => $request->name,
//         'email' => $request->email,
//         'subject' => $request->subject,
//         'message' => $request->message,
//     ];

    //     \Log::info('Email Data:', $data); // Log the request data

    //     Mail::to('rohanaaron16@gmail.com')->send(new ContactMail($data));

    //     \Log::info('Email Sent Successfully');

    //     return back()->with('message', 'Your message has been sent successfully!');
// }

}


