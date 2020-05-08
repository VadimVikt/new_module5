@component('mail::message')
# Удалена статья: {{ $post->title }}

Статья удалена

@component('mail::button', ['url' => '/'])
Перейти на сайт
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
