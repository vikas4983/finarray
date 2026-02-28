@extends('layouts.main-app')
@section('header', 'Categories')
@section('title', 'Categories')
@section('content')
    <div>
        <a href="{{ route('books.index') }}" class="btn btn-info" style="color: white">Books List</a>
        <div class="mt-3">
            @include('alerts.alert')
        </div>
        <div class="container mt-3">
            <form action="{{ route('books.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 form-group col-lg-4">
                        <label for="title" class="form-lable @error('title') is-invalid @enderror">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title">
                        @error('title')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group col-lg-4">
                        <label for="quantity" class="form-lable @error('quantity') is-invalid @enderror">Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="form-control"
                            placeholder="Enter quantity">
                        @error('quantity')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group col-lg-4">
                        <label for="category_id"
                            class="form-lable @error('category_id') is-invalid @enderror">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" disabled>Select One</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>



@endsection
