<x-header></x-header>
@php
$diff = $video->created_at->format('d-m-Y H:m');
@endphp
<div class="container d-flex flex-wrap">
    <div class="video" style="width:100%;height:35rem">
        <video src="/storage/video/{{$video->video}}" controls alt="видео" style="max-width: 100%;max-height:100%"></video>
    </div>
    <div class="descrip border mt-4" style="min-width: 79%;min-height:20rem">
        <p class="ms-2 mt-2">{{$video->description}}</p>
        <p class="ms-2 mt-2">{{$diff}}</p>
    </div>
    @auth
        <div class="rating border mt-4 d-flex gap-3 justify-content-center" style="min-width: 20%;min-height:3rem">
            <a href="/{{$video->id}}/like_add">Лайк: <span>{{$video->likesCount()}}</span></a>
            <a href="/{{$video->id}}/Dislike_add">Дизлайк:<span>{{$video->DislikesCount()}}</span></a>
        </div>
    @endauth

    @guest
    <div class="rating border mt-4 d-flex gap-3 justify-content-center" style="min-width: 20%;min-height:3rem">
        <a href="/authorization">Авторизируйтесь что-бы ставить оценку видео</a>
    </div>
    @endguest

    <div class="comments mt-2" style="min-width:100%;height:20rem">
        <h2>Комментарии</h2>
        @guest
        <h2 style="padding-left: 20px;"><a href="/authorization">Авторизируйтесь для оставления коментария</a></h2>
        @endguest
        @auth
        <form class="d-flex align-items-center justify-content-center" method="POST" action="/{{$video->id}}/comment_create">
            @csrf
            <textarea name="comment" style="width: 90%"></textarea>
            <button type="submit" class="ms-2 btn btn-success">Отправить</button>
        </form>
        @endauth

        @foreach ($comment as $comments)
        @php
            $diff = $comments->created_at->format('d-m-Y H:m');
        @endphp
        <div class="comment  mx-2 my-2">
            <p>Автор:{{$comments->user->nickname}}</p>
            <p>{{$comments ->comment}}</p>
            <p style="font-size:14px;">{{$diff}}</p>
        </div>
        @endforeach
    </div>
</div>
