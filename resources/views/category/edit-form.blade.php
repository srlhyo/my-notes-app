@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">

                    <form action="{{ route('category.update', $category->id) }}" method="post">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}*</label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}">

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


        </div>

    </div>

</div>

@endsection
