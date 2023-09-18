@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>

        </div>
    </div>
    <form method="post" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="mb-3">
            <label for="category" class="form-label">Категория</label>
            <select name="category" id="category" class="form-select">
                <option>Выберите категорию</option>
                @forelse($categoriesList as $categories)
                <option name="{{$categories->id}}" value="{{$categories->id}}">{{$categories->title}}</option>
                @empty
                    <option>Нет категорий</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Заголовок</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="author">Автор</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
        </div>
        <div class="mb-3">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if(old('status') === 'draft') selected @endif>draft</option>
                <option @if(old('status') === 'active') selected @endif>active</option>
                <option @if(old('status') === 'blocked') selected @endif>blocked</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" id="image" >
            <label class="input-group-text" for="inputGroupFile02">Загрузить файл</label>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
