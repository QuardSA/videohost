<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <x-header></x-header>
</head>

<body>
    <div class="container d-flex flex-wrap gap-2 align-items-center">
        @foreach ($videos as $video)
        @php
        $diff = $video->created_at->format('d-m-Y H:m');
        @endphp
            <div class="card ms-4" style="max-width: 18rem;">
                <video src="/storage/video/{{$video->video}}" controls class="card-img-top" alt="..."></video>
                <div class="card-body">
                    <h5 class="card-title">{{$video->title_video}}</h5>
                    <p class="card-text">Автор: {{$video->user->nickname}}</p>
                    <p class="card-text">{{$diff}}</p>
                    <a href="/{{$video->id}}/video" class="btn btn-primary">Перейти к видео</a>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
