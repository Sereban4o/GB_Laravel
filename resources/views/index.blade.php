@extends('layouts.main')
@section('title')Главная страница - @parent @stop
@section('content')

<h1>Приветствие пользователя</h1>
Тут какой-то текст <br>
<a href="/admin">Переход на admin страницу</a>
<a href="/news">Новости</a>
@endsection
