@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <a href="{{route('admin.category.create')}}" class="btn btn-primary">Создать категорию</a>
            </div>
            @include('components.result')
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped align-middle text-center">
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Включена?</th>
                            <th></th>
                        </tr>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>
                                    <a href="{{route('admin.category.edit', $category)}}">{{$category->name}}</a>
                                </td>
                                <td>
                                    @if($category->enabled)
                                        <i class="far fa-check-circle text-success" data-toggle="tooltip" title="Включена"></i>
                                    @else
                                        <i class="far fa-times-circle text-danger" data-toggle="tooltip" title="Отключена"></i>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('admin.category.destroy', $category)}}" method="post" onsubmit="return confirm('Вы действительно хотите удалить категорию \'{{$category->name}}\'?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Удалить"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Нет категорий</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection