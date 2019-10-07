@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th colspan="2" class="bg-dark text-white text-center">Товар #{{$product->id}}</th>
                        </tr>
                        <tr>
                            <td>Название</td>
                            <td>{{$product->name}}</td>
                        </tr>
                        <tr>
                            <td>Категория</td>
                            <td>{{$product->category->name}} (#{{$product->category->id}})</td>
                        </tr>
                        <tr>
                            <td>Количество на складе</td>
                            <td>{{$product->amount}}</td>
                        </tr>
                        <tr>
                            <td>Зарезервировано</td>
                            <td>{{$product->reserved}}</td>
                        </tr>
                        <tr>
                            <td>Цена</td>
                            <td>{{$product->price}} руб.</td>
                        </tr>
                        <tr>
                            <td>Количество в упаковке</td>
                            <td>{{$product->weight}} гр.</td>
                        </tr>
                        <tr>
                            <td>Включен?</td>
                            <td>{{$product->enabled ? 'да' : 'нет'}}</td>
                        </tr>
                        <tr>
                            <td>Новинка?</td>
                            <td>{{$product->is_new ? 'да' : 'нет'}}</td>
                        </tr>
                        <tr>
                            <td>Хит?</td>
                            <td>{{$product->is_hit ? 'да' : 'нет'}}</td>
                        </tr>
                        <tr>
                            <td>Куплено</td>
                            <td>{{$product->buy_count}} гр.</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection