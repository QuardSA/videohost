<x-header></x-header>
<div class="container">
    <h2 class="text-center">Регистрация</h2>
    <form class="d-flex flex-column gap-2" method="POST" action="/registration_validate"
        style="max-width:40%;margin:0 auto">
        @csrf
        <div class="form-group">
            <label for="exampleInputNickname">Никнейм</label>
            <input type="text" class="form-control" id="exampleInputNickname"
                aria-describedby="emailHelp"placeholder="Введите ник" name="nickname">
            @error('nickname')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Почта</label>
            <input type="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp"placeholder="Введите почту" name="email">
            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" name="password">
            @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputConfirmpassword">Подтвердите пароль</label>
            <input type="password" class="form-control" id="exampleInputConfirmpassword"
                aria-describedby="emailHelp"placeholder="Повторите пароль" name="confirm_password">
            @error('confirm_password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>
