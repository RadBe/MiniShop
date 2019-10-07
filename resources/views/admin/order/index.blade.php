@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            @include('components.result')
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped align-middle text-center">
                        <tr>
                            <th>#</th>
                            <th>Статус</th>
                            <th>Телефон</th>
                            <th>Ссылка на ВК</th>
                            <th>Количество товаров</th>
                            <th>Сумма</th>
                            <th></th>
                        </tr>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{\App\Order::STATUS_NAME[$order->status]}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->vk}}</td>
                                <td>{{count($order->products)}}</td>
                                <td>{{$order->calcSum()}}</td>
                                <td><a href="{{route('admin.order.show', $order)}}" class="btn btn-primary btn-sm">Подробнее</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Нет заказов</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="10">{{$orders->render()}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection