<x-header></x-header>
<div class="container">
    <h2 class="text-center">Добавить видео</h2>
    <form class="d-flex flex-column gap-2" method="POST" action="/addvideo_valid"
        style="max-width:40%;margin:0 auto" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputNickname">Название</label>
            <input type="text" class="form-control" id="exampleInputNickname"
                aria-describedby="emailHelp"placeholder="Введите название видео" name="title_video">
            @error('title_video')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            @error('description')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <label for="disabledSelect" class="form-label">Категория</label>
        <select id="disabledSelect" class="form-select" name="categories">
        @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->title_category}}</option>
        @endforeach
        </select>
        @error('categories')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label">Загрузить видео</label>
            <input type="file" name="video" class="form-control" id="imageFile">
            @error('video')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
