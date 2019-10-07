@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <a href="{{route('admin.product.create')}}" class="btn btn-primary">Создать товар</a>
            </div>
            @include('components.result')
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped align-middle text-center">
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>На складе</th>
                            <th>Зарезервировано</th>
                            <th>Цена</th>
                            <th>Включен?</th>
                            <th>Покупок</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><a href="{{route('admin.product.show', $product)}}">{{$product->name}}</a></td>
                                <td>{{$product->category->name}} (#{{$product->category->id}})</td>
                                <td>{{$product->amount}}</td>
                                <td>{{$product->reserved}}</td>
                                <td>{{$product->price}} руб. за {{$product->weight}} гр.</td>
                                <td>
                                    @if($product->enabled)
                                        <i class="far fa-check-circle text-success" data-toggle="tooltip" title="Включен"></i>
                                    @else
                                        <i class="far fa-times-circle text-danger" data-toggle="tooltip" title="Отключен"></i>
                                    @endif
                                </td>
                                <td>{{$product->buy_count}}</td>
                                <td>
                                    <a href="{{route('admin.product.edit', $product)}}" data-toggle="tooltip" title="Редактировать"><i class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{route('admin.product.destroy', $product)}}" method="post" onsubmit="return confirm('Вы действительно хотите удалить товар \'{{$product->name}}\'?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">Нет товаров</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="10">{{$products->render()}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection