<x-header></x-header>
<div class="container d-flex justify-content-center flex-wrap flex-column">
    <div class="addvideo border rounded-5 p-2 mb-2" style="max-width: 10rem"><a href="/addvideo"
            class="text-decoration-none text-dark">+ Добавить видео</a></div>
    @foreach ($videos as $video)
        @php
            $diff = $video->created_at->format('d-m-Y H:m');
        @endphp
        <div class="card mb-3 ms-4" style="max-width: 95%">

            <div class="row g-0">
                <div class="col-md-5">
                    <video src="/storage/video/{{ $video->video }}" controls style="max-width: 32rem;"></video>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">Название ролика: {{ $video->title_video }}</h5>
                        <p class="card-text">Описание: {{ $video->description }}</p>
                        <p class="card-text">Количество лайков: {{ $video->likesCount() }} </p>
                        <p class="card-text">Количество дизлайков: {{ $video->DislikesCount() }}</p>
                        <p class="card-text">Категория: {{ $video->category->title_category }}</p>
                        <p class="card-text">Ограничение: {{ $video->limited->title_limit }}</p>
                        <p class="card-text"><small class="text-muted">Дата и время загрузки ролика:
                                {{ $diff }}</small></p>
                    </div>
                </div>
            </div>

        </div>
    @endforeach
</div>
