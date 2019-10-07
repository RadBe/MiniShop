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
                                    @if(in_array($product->id, $cart))
                                        <form action="{{route('cart.remove', $product)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn" title="Удалить">В корзине</button>
                                        </form>
                                    @else
                                        <form action="{{route('cart.add', $product)}}" method="post">
                                            @csrf
                                            <input type="number" name="amount" min="{{$product->weight}}" max="{{$product->amount - $product->reserved}}" step="{{$product->weight}}" value="{{$product->weight}}">
                                            <button type="submit" class="btn" @if(!$product->isBuyable()) disabled @endif>В корзину</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">Товаров нет в магазине</div>
                </div>
            </div>
        @endforelse
    </div>

    {{$products->render()}}

    <div class="row justify-content-center mt-5">
        @foreach($reviews as $review)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{$review->url}}" alt="" style="max-width: 100%">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
