<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2'
        ]);
        Tag::query()->create([
            'name' => $request->name
        ]);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('admin.tags.index');

    }

    public function edit($id)
    {
        $tag = Tag::query()->findOrFail($id);
        return view('admin.tags.edit', compact('tag'));

    }

    public function update(Request $request, $id)
    {
        $tag = Tag::query()->findOrFail($id);

        $request->validate([
            'name' => 'required|string|min:2'
        ]);
        $tag->update([
            'name' => $request->name
        ]);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('admin.tags.index');
    }

    public function delete($id)
    {
        $tag = Tag::query()->findOrFail($id)->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('admin.tags.index');
    }

}
