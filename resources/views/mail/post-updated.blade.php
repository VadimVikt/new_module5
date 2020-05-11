@component('mail::message')
# Cтатья: {{ $post->title }} изменена

    {{ $post->short_drscription }}


@component('mail::button', ['url' => '/posts/' . $post->slug])
Посмотреть статью
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
