<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <x-links></x-links>
    <x-alerts></x-alerts>
    <div class="container">
        <a role="button" href="/sign_out" class="btn btn-danger m-2">Выход из аккаунта</a>
        <h2 class="mt-3">Видео</h2>
        @foreach ($videos as $video)
        @php
        $diff = $video->created_at->format('d-m-Y H:m');
        @endphp
        <div class="row g-0 ">
            <div class="col-md-4">
                <video src="/storage/video/{{$video->video}}" controls  alt="..." style="max-width: 25rem"></video>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Название ролика: {{$video->title_video}}</h5>
                    <p class="card-text mt-1">Описание: {{$video->description}}</p>
                    <p class="card-text">Количество лайков: {{$video->likesCount()}}</p>
                    <p class="card-text">Количество дизлайков: {{$video->DislikesCount()}}</p>
                    <p class="card-text">Категория: {{$video->category->title_category}}</p>
                    <form method="POST" action="/{{$video->id}}/edit_limits" class="d-flex flex-column gap-1" style="max-width: 40%">
                        @csrf
                        <select name="limites" class="option_status">
                            <option value="" disabled selected>{{$video->limited->title_limit}}</option>
                            @foreach ($limit as $limits)
                                <option value="{{$limits ->id }}"> {{$limits->title_limit}} </option>
                            @endforeach
                        </select>
                            <input type="submit" class="input_admin" value="Изменить">
                        </form>
                    <p class="card-text"><small class="text-muted">Дата и время загрузки ролика {{$diff}}</small></p>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</body>

</html>
