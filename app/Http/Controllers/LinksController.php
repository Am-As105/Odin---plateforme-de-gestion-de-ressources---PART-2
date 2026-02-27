<?php

namespace App\Http\Controllers;
// use App\Http\Controllers;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinksController extends Controller
{
    public function index(Category $category)
    {
        $links = $category->links()->get();
        return view('links.index', compact('category', 'links'));
    }

    public function create(Category $category)
    {
        return view('links.create', compact('category'));
    }

    public function store(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|url',
        ]);

        $category->links()->create([
            'title' => $request->title,
            'url' => $request->url,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('categories.links.index', $category->id)
                         ->with('success', 'Link added successfully!');
    }

    public function edit(Category $category, Link $link)
    {
        return view('links.edit', compact('category', 'link'));
    }

    public function update(Request $request, Category $category, Link $link)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|url',
        ]);

        $link->update([
            'title' => $request->title,
            'url' => $request->url,
        ]);

        return redirect()->route('categories.links.index', $category->id)
                         ->with('success', 'Link updated successfully!');
    }

    public function destroy(Category $category, Link $link)
    {
        $link->delete();

        return redirect()->route('categories.links.index', $category->id)
                         ->with('success', 'Link deleted successfully!');
    }
}