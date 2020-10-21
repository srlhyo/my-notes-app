@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __(isset($category) ? 'Edit Category' : 'Create Category') }}</div>

                <div class="card-body">

                    <form action="{{ isset($category ) ? route('categories.update', $category->id) : route('categories.store') }}" method="post">
                        @isset($category)
                            @method('PUT')
                        @endisset

                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}*</label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($category) ? $category->name : '' }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </form>

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
