<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags')->latest()->get();
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function store()
    {
        $this->validate(request(), [
            'slug' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'body' => 'required',
        ]);

        Post::create(request()->all());

        flash('Стаья успешно создана');

        return redirect('/posts');

    }

    public function edit(Post $post)
    {

        return view('posts.edit',compact('post'));
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'slug' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'body' => 'required',
        ]);
        $post->update($attributes);
        /** @var Collection $taskTags */
        $taskTags = $post->tags->keyBy('name');
        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });

        $tagsToAttach = $tags->diffKeys($taskTags);
        $tagsToDetach = $taskTags->diffKeys($tags);
        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($tag);
        }
        foreach ($tagsToDetach as $tag) {
            $post->tags()->detach($tag); ############
        }
        flash('Стаья успешно обновлена');
        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        flash('Статья удалена', 'warning');
        return redirect('/posts');

    }


}
