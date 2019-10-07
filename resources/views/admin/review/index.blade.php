@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <a href="{{route('admin.review.create')}}" class="btn btn-primary">Добавить отзыв</a>
            </div>
            @include('components.result')
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped align-middle text-center">
                        <tr>
                            <th>#</th>
                            <th>Ссылка</th>
                            <th>Дата</th>
                            <th></th>
                        </tr>
                        @forelse($reviews as $review)
                            <tr>
                                <td>{{$review->id}}</td>
                                <td><a href="{{$review->url}}">{{$review->url}}</a></td>
                                <td>{{$review->created_at}}</td>
                                <td>
                                    <form action="{{route('admin.review.destroy', $review)}}" method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Удалить"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Нет отзывов</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="10">{{$reviews->render()}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection