<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//models
use App\Models\Tag;

//Helpers
use Illuminate\Support\Str;

//Request

use App\Http\Requests\Tag\StoreRequest as TagStoreRequest;
use App\Http\Requests\Tag\UpdateRequest as TagUpdateRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagStoreRequest $request)
    {
        $tagData = $request->validated();
        
        $slug = Str::slug($tagData['title']);
        $tag = Tag::create([
            'title' => $tagData['title'],
            'slug' => $slug,
        ]);

        return redirect() -> route('admin.tags.show', ['tag'=>$tag->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tagData = $request->validated();
        
        $slug = Str::slug($tagData['title']);

        $tag -> update([
            'title' => $tagData['title'],
            'slug' => $slug,
        ]);

        return redirect() -> route('admin.tags.show', ['tag'=>$tag->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $tag -> delete();
        return redirect()->route('admin.tags.index');
    }
}
