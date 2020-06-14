<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="{{ route('index') }}">Главная</a>
        <a class="p-2 text-muted" href="{{ route('news.index') }}">Новости</a>
        <a class="p-2 text-muted" href="{{ route('about') }}">О нас</a>
        <a class="p-2 text-muted" href="{{ route('contacts') }}">Контакты</a>
        <a class="p-2 text-muted" href="{{ route('posts.create') }}">Создать статью</a>
        <a class="p-2 text-muted" href="{{ route('admin.feedbacks') }}">Администрирование</a>
    </nav>
</div>
<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="{{ route('admin.feedbacks') }}">Список сообщений</a>
        <a class="p-2 text-muted" href="{{ route('admin.posts.index') }}">Список статей</a>
        <a class="p-2 text-muted" href="{{ route('news.create') }}">Создать новость</a>
        <a class="p-2 text-muted" href="{{ route('statistics') }}">Статистика</a>
    </nav>
</div>
