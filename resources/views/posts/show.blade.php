
@extends('layout.master')

@section('title', $post->title)
<?var_dump($post)?>
@section('content')
    <div class="col-md-8 blog-main" >
        <h3 class="pb-3 mb-4 font italic border-bottom">
            {{ $post->title }}
            <a href="/posts/{{ $post->slug }}/edit">Редактировать</a>
        </h3>
       @include('posts.tags', ['tags' => $post->tags])
        <h4 class="pb-3 mb-4 font italic border-bottom">
            {{ $post->created_at->toFormattedDateString() }}
        </h4>

        {{ $post->body }}

    </div>
@endsection
