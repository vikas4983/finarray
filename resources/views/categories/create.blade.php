@extends('layouts.main-app')
@section('title', 'Categories')
@section('header', 'Add Categories')
@section('content')
    <div>
        <a href="{{ route('categories.index') }}" class="btn btn-info mt-2" style="color: white">Category List</a>
        <div class="container mt-3">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="mb-3 col-lg-6">
                    <label for="name" class="form-lable">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter category name">

                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>

        </div>
    </div>



@endsection
