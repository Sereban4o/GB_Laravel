@extends('layouts.main')
@section('title'){{$news['title']}} - @parent @stop
@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <h2>{{$news['title']}}</h2>
            <img src="{{$news['image']}}"/>
            <p>{!! $news['description'] !!}</p>
            <p>{{$news['author']}}</p>
            <p>{{$news['created_at']}}</p>
            <p>{{$news['status']}}</p>
        </div>
    </div>
@endsection
