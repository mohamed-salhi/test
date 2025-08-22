<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Ads;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function home()
    {
        $categories = Category::query()->with('posts')->get();
        $tags = Tag::all();
        $news = Post::all();
        $latest = Post::query()->latest()->get();
        $popular = Post::query()->orderByDesc('view')->get();

        $ads = Ads::all();

        return view('web.home', compact('popular', 'latest', 'categories', 'tags', 'news', 'ads'));
    }

    public function details($id)
    {

        $post = Post::query()->findOrFail($id);
        $post->increment('view');
        return view('web.details', compact('post'));

    }

    public function contact()
    {
        return view('web.contact');
    }

    public function post(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        Mail::to('test@gmail.com')->send(new ContactMail($request->all()));
        toastr()->success('تم الارسال بنجاح');
        return redirect()->back();

    }
}
