@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="#" class="btn btn-sm btn-outline-secondary">Добавить</a>
            </div>

        </div>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    @include('inc.message')
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Почта</th>
                <th scope="col">Действия</th>
                <th scope="col">Назначить/Снять</th>
            </tr>
            </thead>
            <tbody>

            @forelse($users as $user)
             @if(Auth::user()<>$user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{ route('admin.users.edit', $user) }}">Ред.</a> |  <a href="">Уд.</a></td>
                    <td class="d-flex justify-content-end">
                        @if ($user->is_admin)
                            <a href="{{route('admin.users.toggleAdmin', $user)}}" type="button" class="btn btn-danger">Снять админа</a>
                        @else
                            <a href="{{route('admin.users.toggleAdmin', $user)}}" type="button" class="btn btn-success">Назначить админа</a>
                        @endif
                    </td>
                </tr>
             @endif
            @empty
                <tr>
                    <td colspan="6">Пользователей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
