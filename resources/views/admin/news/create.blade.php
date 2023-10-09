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
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    @include('inc.message')
    <form method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="category" class="form-label">Категория</label>
            <select name="category_id" id="category_id" class="form-select">
                <option>Выберите категорию</option>
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('category_id') == $category->id)>{{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Заголовок</label>
            <input type="text" class="form-control"
                   name="title" id="title" value="{{ old('title') }}">
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
                @foreach(\App\Enums\News\Status::getEnums() as $statusEnums)
                    <option @selected(old('status') === $statusEnums)>{{$statusEnums}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" id="image">
            <label class="input-group-text" for="inputGroupFile02">Загрузить файл</label>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
@push('js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ),{
                ckfinder: {
                    uploadUrl: '{{route('admin.image.upload').'?_token='.csrf_token()}}',
                }
            })
            .catch( error => {
                console.error( error );
            } );
    </script>

@endpush
