<x-alerts></x-alerts>
<x-links></x-links>
<div class="container">
    @guest
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <h2><em><b>FreeRunVideo</b></em></h2>
            </a>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-dark">Главная</a></li>
            </ul>
            <div class="col-md-3 text-end">
                <a role="button" href="/authorization" class="btn btn-outline-primary me-2">Авторизация</a>
                <a role="button" href="/registration" class="btn btn-primary">Регистрация</a>
            </div>
        </header>
    @endguest
    @auth
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <h2><em><b>FreeRunVideo</b></em></h2>
            </a>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-dark">Главная</a></li>
                <li><a href="/myvideo" class="nav-link px-2 link-dark">Мои видео</a></li>
            </ul>
            <div class="col-md-3 text-end">
                <a role="button" href="/sign_out" class="btn btn-danger">Выход</a>
            </div>
        </header>
    @endauth
</div>
