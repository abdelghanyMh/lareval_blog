<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;

use App\Models\Post;


class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $validated = $request->validated();

        // store the VALIDATED post to the database
        $post = $request->user()->posts()->create($validated);

        return redirect()
            ->route('posts.show', [$post])
            ->with('success', 'Post is submitted! Title: ' . $post->title  . ' Description: ' . $post->description);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', [
            'post' =>  $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validated();

        // update the VALIDATED post to the database
        $post->update($validated);

        return redirect()
            ->route('posts.show', [$post])
            ->with('success', 'Post is Updated! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Post has been deleted! ');
    }
}
