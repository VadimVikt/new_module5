@extends('layout.master')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Редактирование статьи
        </h3>
        @include('layout.errors')
        <form method="post" action="/posts/{{ $post->slug }}">

            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="codePost">Код статьи</label>
                <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" class="form-control" id="codePost" aria-describedby="emailHelp" placeholder="ex: post-1_from_space">
                <small id="emailHelp" class="form-text text-muted">Символьный код - уникальное поле, только латинские буквы подчеркивание и тире.</small>
                <div class="form-group">
                    <label for="titlePost">Название статьи</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control" id="titlePost" aria-describedby="emailHelp" placeholder="Введите заголовок">
                </div>
                <div class="form-group">
                    <label for="shortDescription">Краткое описание статьи</label>
                    <input type="text" name="short_description" value="{{ old('short_description', $post->short_description) }}" class="form-control" id="shortDescription" placeholder="Введите краткое описание статьи">
                </div>
                <div class="form-group">
                    <label for="textarea">Введите текст статьи</label>
                    <textarea class="form-control" name="body" id="textarea" rows="5">{{ old('body', $post->body) }}</textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="publication" class="form-check-input" id="publicate">
                    <label class="form-check-label" for="publicate">Опубликовано</label>
                </div>
{{--                <button type="submit" class="btn btn-primary">Записать</button>--}}
            </div>
            <div class="form-group">
                <label for="inputTags">Теги</label>
                <input  type= "text"
                        class="form-control"
                        name="tags"
                        id="inputTags"
                        value="{{ old('tags', $post->tags->pluck('name')->implode(',')) }}"
                >


            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
        <form method="POST" action="/posts/{{ $post->slug }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
