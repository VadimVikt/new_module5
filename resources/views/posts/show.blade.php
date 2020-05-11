
@extends('layout.master')

@section('title', $post->title)

@section('content')
    <div class="col-md-8 blog-main" >
        <h3 class="pb-3 mb-4 font italic border-bottom">
            {{ $post->title }}
            @can('update', $post)
            <a href="/posts/{{ $post->slug }}/edit">Редактировать</a>
            @endcan
        </h3>
       @include('posts.tags', ['tags' => $post->tags])
        <h4 class="pb-3 mb-4 font italic border-bottom">
            {{ $post->created_at->toFormattedDateString() }}
        </h4>

        {{ $post->body }}

    </div>
@endsection
