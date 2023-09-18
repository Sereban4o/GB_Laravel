@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>

        </div>
    </div>
    <form method="post" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Описание</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Псевдоним</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}">
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
