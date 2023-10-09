@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список ресурсов</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.resources.create')}}" class="btn btn-sm btn-outline-secondary">Добавить</a>
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
                <th scope="col">Ссылка</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resourcesList as $resource)
                <tr  id="{{$resource->id}}">
                    <td>{{$resource->link}}</td>
                    <td><a href="{{ route('admin.resources.edit', $resource) }}">Ред.</a> | <a rel="{{$resource->id}}" class="delete" href="javascript:">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Новостей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
@push('js')
    <script>


        let elements = document.querySelectorAll(".delete");
        elements.forEach(function (element, key){
            element.addEventListener('click', function (){
                const id = this.getAttribute('rel');
                if (confirm(`Подтверждаете удаление записи с #ID = ${id}`)){
                    send(`/admin/resources/${id}`).then(()=>{
                        document.getElementById(id).remove();
                    });
                }else{
                    alert("Вы отменили удаление записи");
                }
            });
        });

        async function send(url){
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }

    </script>
@endpush
