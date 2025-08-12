<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::query()->orderBy('created_at')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
                'email' => 'required|email|unique:posts',
                'name' => 'required|string',
                'title' => 'required|string',
                'like' => 'nullable|int',
                'image' => 'nullable|image|mimes:jpg,png'
            ]
        );
        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('posts/v1/', 'public');
        }
        Post::query()->create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'like' => $request->like,
            'image' => $imagepath,
        ]);
        return redirect()->route('posts.get')->with('done', 'تم الاضافة بنجاح');

    }

    public function edit($id)
    {
        $post = Post::query()->findOrFail($id);
        return view('posts.edit', compact('post'));

    }

    public function update(Request $request)
    {
        $post = Post::query()->findOrFail($request->id);

        $validate = $request->validate([
                'email' => 'required|email|unique:posts,email,' . $post->id,
                'name' => 'required|string',
                'title' => 'required|string',
                'like' => 'nullable|int',
                'image' => 'nullable|image|mimes:jpg,png'

            ]
        );
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagepath = $request->file('image')->store('posts', 'public');
        }
        $post->update([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'like' => $request->like,
            'image' => $imagepath,
        ]);

        return redirect()->route('posts.get')->with('done', 'تم التعديل بنجاح');

    }

    public function delete(Request $request)
    {
        $post = Post::query()->findOrFail($request->id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.get')->with('done', 'تم الحذف بنجاح');

    }

}
