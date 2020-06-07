<div class="form-group">
    <label for="slug">Символьный код</label>
    <input
        type="text"
        class="form-control"
        name="slug"
        id="slug"
        placeholder="Введите символьный код"
        value="{{ old('slug') ?? $news->slug ?? '' }}">
</div>
<div class="form-group">
    <label for="name">Заголовок новости</label>
    <input
        type="text"
        name="name"
        class="form-control"
        id="name"
        placeholder="Введите заголовок новости"
        value="{{ old('name') ?? $news->name ?? '' }}">
</div>
<div class="form-group">
    <label for="announce">Анонс новости</label>
    <textarea
        class="form-control"
        id="announce"
        name="announce"
        rows="3">{{ old('announce') ?? $news->announce ?? '' }}
        </textarea>
</div>
<div class="form-group">
    <label for="body">Детальное описани</label>
    <textarea
        class="form-control"
        id="body"
        name="body"
        rows="7">{{ old('body') ?? $news->body ?? '' }}
        </textarea>
</div>
<div class="form-group">
    <label for="tags">Теги(Тэг1|Тэг2| ...)</label>
    <input
        type="text"
        name="tags"
        class="form-control"
        id="tags"
        placeholder="Введите тэги стать через |"
        value="{{ old( 'tags', isset($news) ? $news->tags->pluck('name')->implode('|') : '') }}">
</div>
<div class="form-group form-check">
    <input type="hidden" name="published" value="0">
    <input
        type="checkbox"
        class="form-check-input"
        name="published"
        {{ isset($news) ? ($news->published ? 'checked' : '') : ''}}
        id="published"
        value="1">
    <label class="form-check-label" for="published">Опубликовано</label>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
