@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            @include('components.result')
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.product.update', $product)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @component('admin.product.parts.form', ['categories' => $categories, 'product' => $product])
                            @slot('save') Сохранить @endslot
                        @endcomponent
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection