@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}<a href="{{ route('categories.create') }}" class="float-right btn btn-primary btn-sm">{{ __('Add Categories') }}</a></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-{{ session('status')['class-name'] }}" role="alert">
                            {{ session('status')['message'] }}
                        </div>
                    @endif

                    <ul class="list-group list-group-flush">
                        @foreach (auth::user()->categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a>

                                <form class="float-right" action="{{ route('categories.destroy', $category->id) }}" method="post">
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
