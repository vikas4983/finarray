@extends('layouts.main-app')
@section('title', 'category')
@section('header', 'Edit Category')
@section('content')
    <div>

        <div class="container">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="mb-3 col-lg-6">
                    <label for="name" class="form-lable">Name</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}"
                        class="form-control @error('name') is-invalid @enderror " placeholder="Enter name">
                </div>
                @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>

@endsection
