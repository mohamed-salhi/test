<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('posts')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2'
        ]);
        Category::query()->create([
            'name' => $request->name
        ]);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('admin.categories.index');

    }

    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);
        return view('admin.categories.edit', compact('category'));

    }

    public function update(Request $request, $id)
    {
        $category = Category::query()->findOrFail($id);

        $request->validate([
            'name' => 'required|string|min:2'
        ]);
        $category->update([
            'name' => $request->name
        ]);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        $category = Category::query()->findOrFail($id)->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('admin.categories.index');
    }

}
