@extends('layouts.admin')

@section('content')
    <style>
        .product {
            text-align: center;
        }
        .product img {
            max-width: 100%;
        }
    </style>

    <div class="row">
        <div class="col-5">
            @include('components.result')
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover align-middle">
                        <tr>
                            <th colspan="2" class="bg-dark text-white text-center">Заказ #{{$order->id}}</th>
                        </tr>
                        <tr>
                            <td>Статус:</td>
                            <td>{{\App\Order::STATUS_NAME[$order->status]}}</td>
                        </tr>
                        <tr>
                            <td>Телефон:</td>
                            <td>{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <td>ВК:</td>
                            <td>
                                @if(\Illuminate\Support\Str::startsWith($order->vk, 'http') || \Illuminate\Support\Str::startsWith($order->vk, 'vk.com'))
                                    <a href="{{$order->vk}}" class="btn btn-primary btn-sm" target="_blank" data-toggle="tooltip" title="{{$order->vk}}">Перейти</a>
                                @else
                                    <a href="https://vk.com/{{$order->vk}}" class="btn btn-primary btn-sm" target="_blank" data-toggle="tooltip" title="{{$order->vk}}">Перейти</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Всего товаров:</td>
                            <td>{{count($order->products)}}</td>
                        </tr>
                        <tr>
                            <td>Общая сумма:</td>
                            <td>{{$order->calcSum()}}</td>
                        </tr>
                        <tr>
                            <td>Дата заказа:</td>
                            <td>{{$order->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Дата обновления:</td>
                            <td>{{$order->updated_at}}</td>
                        </tr>
                    </table>

                    <div class="form-inline justify-content-center">
                        <form action="{{route('admin.order.done', $order)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success-outline m-3">Выполнить</button>
                        </form>
                        <form action="{{route('admin.order.approve', $order)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-warning-outline m-3">Подтвердить</button>
                        </form>
                        <form action="{{route('admin.order.remove', $order)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger-outline m-3">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="row justify-content-center">
                @foreach($order->products as $product)
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body product">
                                <table>
                                    <tr>
                                        <td><img src="{{asset('uploads/products/images/' . $product->id . '.png')}}" alt="{{$product->name}}"></td>
                                    </tr>
                                    <tr>
                                        <td>{{$product->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><small>{{$product->amount}} / {{$product->reserved}}</small></td>
                                    </tr>
                                    <tr>
                                        <td><small>{{$product->price}} руб. за {{$product->weight}} гр.</small></td>
                                    </tr>
                                    <tr>
                                        <td><code>{{$product->pivot->amount}} гр. за {{$product->pivot->price}} руб.</code></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection