<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(5);

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'name'          => 'required|string|max:100',
                'slug'          => 'required|string|max:100|unique:categories',
            ]);

            $data = $request->all();

            $tag = new Tag;
            $tag->name =           $data['name'];
            $tag->slug =           $data['slug'];
            $tag->save();

            // return redirect()->route('admin.tags.show', ['tag' => $tag]); manca la pagina show
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //non serve per i tag
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'          => 'required|string|max:100',
            'slug'          => [
                'required',
                'string',
                'max:100',
                Rule::unique('tags')->ignore($tag),
            ],
        ]);

        $data = $request->all();

        $tag->name =           $data['name'];
        $tag->slug =           $data['slug'];
        $tag->update();

        // return redirect()->route('admin.tags.show', ['tag' => $tag]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        // manca la function destroy
    }
}
