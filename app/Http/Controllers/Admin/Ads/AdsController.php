<?php

namespace App\Http\Controllers\Admin\Ads;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ads;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\Translation\t;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::query()->orderBy('created_at')->get();
        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|string',
            'image' => 'required|image',


        ]);
        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('ads', 'public');
        }
      $ads=  Ads::query()->create([
            'link' => $request->link,
            'image' => $imagepath,
        ]);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('admin.ads.index');

    }

    public function edit($id)
    {
        $ads=Ads::query()->findOrFail($id);
        return view('admin.ads.edit',compact('ads'));

    }

    public function update(Request $request, $id)
    {
        $ads = Ads::query()->findOrFail($id);
        $request->validate([
            'link' => 'required|string',
            'image' => 'required|image',
        ]);
        if ($request->hasFile('image')) {
            if ($ads->image) {
                Storage::disk('public')->delete($ads->image);
            }
            $imagepath = $request->file('image')->store('ads', 'public');
        }
        $ads->update([
            'link' => $request->link,
            'image' => $imagepath,
            ]);

        toastr()->success('Data has been updated successfully!');
        return redirect()->route('admin.ads.index');
    }

    public function delete(Request $request)
    {
        $ads = Ads::query()->findOrFail($request->id);
        if ($ads->image) {
            Storage::disk('public')->delete($ads->image);
        }
        $ads->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('admin.ads.index');

    }

}
