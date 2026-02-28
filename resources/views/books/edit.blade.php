@extends('layouts.main-app')
@section('title', 'Books')
@section('header', 'Edit Book')
@section('content')
    <div>
        {{-- <a href="{{ route('books.update',$book->id) }}" class="btn btn-info">Edit Book</a> --}}
        <div class="container">
            <form action="{{ route('books.update', $book->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="mb-3 form-group col-lg-4">
                        <label for="title" class="form-lable @error('title') is-invalid @enderror">Title</label>
                        <input type="text" name="title" value="{{ $book?->title ?? '' }}" id="title"
                            class="form-control" placeholder="Enter title">
                        @error('title')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group col-lg-4">
                        <label for="quantity" class="form-lable @error('quantity') is-invalid @enderror">Quantity</label>
                        <input type="text" name="quantity" value="{{ $book?->quantity ?? '' }}" id="quantity"
                            class="form-control" placeholder="Enter quantity">
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
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
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
