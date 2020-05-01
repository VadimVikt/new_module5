@extends('layout.master')
@section('title', 'Список статей')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Список статей
        </h3>
            @foreach($posts as $post)
                <div class="container">
                    <div class="row mb-2">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">Космические истории</strong>
                            <h3 class="mb-0">{{ $post->title }}</h3>
                            <div class="mb-1 text-muted">{{ $post->created_at->toFormattedDateString() }}</div>
                            <p class="card-text mb-auto">{{ $post->short_description }}</p>
                            <a href="/posts/{{ $post->slug }}" class="stretched-link">Продолжить чтение</a>
                            @include('posts.tags', ['tags' => $post->tags])
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
    </div>
@endsection
