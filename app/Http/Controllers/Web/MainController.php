<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $categories=Category::query()->with('posts')->get();
        $tags=Tag::all();
        $news=Post::all();
        $latest=Post::query()->latest()->get();
        $popular=Post::query()->orderByDesc('view')->get();

        $ads=Ads::all();

        return view('web.home',compact('popular','latest','categories','tags','news','ads'));
    }
    public function details($id){

        $post=Post::query()->findOrFail($id);
        $post->increment('view');
        return view('web.details',compact('post'));

    }
}
