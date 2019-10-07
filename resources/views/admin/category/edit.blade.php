@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            @include('components.result')
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.category.update', $category)}}" method="post">
                        @csrf
                        @method('PUT')
                        @component('admin.category.parts.form', ['category' => $category])
                            @slot('save') Сохранить @endslot
                        @endcomponent
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection