@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                @include('components.result')
                <div class="card-body">
                    <form action="{{route('admin.category.store')}}" method="post">
                        @csrf
                        @component('admin.category.parts.form')
                            @slot('save') Создать @endslot
                        @endcomponent
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection