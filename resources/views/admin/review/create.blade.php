@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                @include('components.result')
                <div class="card-body">
                    <form action="{{route('admin.review.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>URL картинки</label>
                            <input type="text" class="form-control" name="url">
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection