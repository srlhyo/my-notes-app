@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}<a href="{{ route('category.create') }}" class="float-right btn btn-primary btn-sm">{{ __('Add Categories') }}</a></div>
                <div class="card-body">

                    @switch(session('status'))
                        @case('Category Saved')
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @break
                        @case('Category Updated')
                            <div class="alert alert-warning" role="alert">
                                {{ session('status') }}
                            </div>
                            @break
                        @case('Category Deleted')
                            <div class="alert alert-danger" role="alert">
                                {{ session('status') }}
                            </div>
                            @break
                        @default

                    @endswitch

                    <ul class="list-group list-group-flush">
                        @foreach ($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route('category.edit', $category->id) }}">{{ $category->name }}</a>

                                <form class="float-right" action="{{ route('category.destroy', $category->id) }}" method="post">
                                    @method('Delete')
                                    @csrf

                                    <button type="submit" class="btn bg-light text-danger btn-sm">{{ __('Delete') }}</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <a href="{{ route('note.list') }}" class="p-2 bg-light text-dark font-weight-bold">{{ __('Back to notes') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
