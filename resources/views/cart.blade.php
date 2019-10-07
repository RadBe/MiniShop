@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.result')
        <div class="row justify-content-center">
            @forelse($products as $product)
                <div class="col-md-3 mb-2">
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
                                    <td>{{$product->price}} руб. за {{$product->weight}} гр.</td>
                                </tr>
                                <tr>
                                    <td>
                                        @if(($product->isBuyable()))
                                            <span class="text-success">В наличии</span>
                                        @else
                                            <span class="text-danger">Нет в наличии</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{route('cart.remove', $product)}}" method="post">
                                            @csrf
                                            <input type="number" value="{{$product->_cartAmount}}" disabled>
                                            <button type="submit" class="btn mt-1">Убрать</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body text-center">Корзина пуста. <a href="{{route('home')}}">Перейти в каталог</a></div>
                    </div>
                </div>
            @endforelse
        </div>
        @if (count($products) > 0)
            <div class="row mt-3 justify-content-center">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('cart.clear')}}" method="post" onsubmit="return confirm('Вы уверены что хотите очистить корзину?')">
                                @csrf
                                <button type="submit" class="btn w-100">Очистить корзину</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Выбрано товаров:</td>
                                    <td>{{count($products)}} шт.</td>
                                </tr>
                                <tr>
                                    <td>Итоговая сумма:</td>
                                    <td>{{$sum}} руб.</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <form action="{{route('cart.order')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Номер телефона:</label>
                                                <input type="text" class="form-control" name="phone">
                                                <code>в формате: +79001234567</code>
                                            </div>
                                            <div class="form-group">
                                                <label>Либо ссылка на страницу ВК:</label>
                                                <input type="text" class="form-control" name="vk">
                                            </div>
                                            <button type="submit" class="btn">Заказать</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection