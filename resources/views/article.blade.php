<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">Статейник</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link" aria-current="page">На главную</a></li>
            <li class="nav-item"><a href="/articles" class="nav-link active">Каталог статей</a></li>
        </ul>
    </header>
</div>

<main class="container mt-5">

    <div class="card">
        <div class="card-body">
            Теги:
            @foreach ($tags as $tag)
                <a href="/articles?tag={{$tag->name}}" class="btn btn-primary">{{$tag->name}}</a>
            @endforeach
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-text">{{$article->text}}</p>
            <p class="card-text">Количество просмотров: {{$article->views_count}}</p>
            <p class="card-text">Дата создания: {{$article->created_at->format('d-m-Y H:i:s')}}</p>
        </div>
    </div>

    <h5 class="card-title">Оставить комментарий:</h5>
    <form action="/api/articles/{{$article->id}}/comment" method="post">
        <div class="form-group">
            <label>
                <input class="form-control" type="text" placeholder="Тема сообщения" name="title">
            </label>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Сообщение</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

    <h5 class="card-title">Комментарии:</h5>
    @foreach ($comments as $comment)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$comment->title}}</h5>
                <p class="card-text">{{$comment->text}}</p>
                <p class="card-text">Дата создания: {{$comment->created_at->format('d-m-Y H:i:s')}}</p>
            </div>
        </div>
    @endforeach

</main>

</body>
</html>