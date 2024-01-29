<x-header></x-header>
<div class="container d-flex flex-wrap">
    <div class="video border" style="width:100%;height:35rem">
        <video src="..." alt="видео"></video>
    </div>
    <div class="descrip border mt-4" style="min-width: 79%;min-height:20rem">
        <p class="ms-2 mt-2">Описание</p>
        <p class="ms-2 mt-2">Дата загрузки</p>
    </div>

    <div class="rating border mt-4 d-flex gap-3 justify-content-center" style="min-width: 20%;min-height:3rem">
        <a href="#">Лайк</a>
        <a href="#">Дизлайк</a>
    </div>
    <div class="comments border mt-2" style="min-width:100%;height:20rem">
        <h2>Комментарии</h2>
        <form class="d-flex align-items-center justify-content-center">
            @csrf
            <textarea name="" style="width: 90%"></textarea>
            <button type="button" class="ms-2 btn btn-success">Отправить</button>
        </form>
        <div class="comment border mx-2">
            <p>Имя пользователя</p>
            <p>Коммент</p>
        </div>
    </div>
</div>
