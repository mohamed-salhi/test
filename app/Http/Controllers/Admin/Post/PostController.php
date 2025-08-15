<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\Translation\t;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->with('category')->with('tags')->orderBy('created_at')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:2',
            'msg' => 'required|string|min:2',
            'image' => 'required|image',
            'tags' => 'required||array',
            'category_id' => 'required|exists:categories,id'

        ]);
        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('posts', 'public');
        }
      $post=  Post::query()->create([
            'title' => $request->title,
            'content' => $request->msg,
            'category_id' => $request->category_id,
            'image' => $imagepath,
        ]);
        $post->tags()->sync($request->tags);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('admin.posts.index');

    }

    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post=Post::query()->findOrFail($id);
        return view('admin.posts.edit', compact('categories','tags','post'));

    }

    public function update(Request $request, $id)
    {
        $post = Post::query()->findOrFail($id);
        $request->validate([
            'title' => 'required|string|min:2',
            'msg' => 'required|string|min:2',
            'image' => 'required|image',
            'tags' => 'required||array',
            'category_id' => 'required|exists:categories,id'

        ]);
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagepath = $request->file('image')->store('posts', 'public');
        }
        $post->update([
            'title' => $request->title,
            'content' => $request->msg,
            'category_id' => $request->category_id,
            'image' => $imagepath,
            ]);
        $post->tags()->sync($request->tags);

        toastr()->success('Data has been updated successfully!');
        return redirect()->route('admin.posts.index');
    }

    public function delete(Request $request)
    {
        $post = Post::query()->findOrFail($request->id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->tags()->detach($request->tags);

        $post->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('admin.posts.index');

    }

}
