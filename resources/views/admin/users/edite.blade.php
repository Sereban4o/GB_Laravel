@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    @include('inc.message')
    <form method="post" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ old('email') ?? $user->email }}">
        </div>

        <div class="form-group">
            <input class="form-check-input" name="is_admin" id="is_admin" type="checkbox" value="" id="flexCheckDefault" @if($user->is_admin) checked @endif>
            <label class="form-check-label" for="flexCheckDefault">
               Админ
            </label>
        </div>
        <div class="form-group">
            <label for="password">Текущий пароль</label>
            <input type="text" class="form-control" name="password" id="password" value="">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Обновить</button>
    </form>
@endsection
