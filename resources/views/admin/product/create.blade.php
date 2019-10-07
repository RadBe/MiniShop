@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            @include('components.result')
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @component('admin.product.parts.form', ['categories' => $categories])
                            @slot('save') Создать @endslot
                        @endcomponent
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection