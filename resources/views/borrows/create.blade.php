@extends('layouts.main-app')
@section('header', 'Borrow')
@section('title', 'Borrow')
@section('content')
    <div>
        <a href="{{ route('borrows.index') }}" class="btn btn-info" style="color: white">Borrow List</a>

        @include('alerts.alert')
        <div class="container mt-3">
            <form action="{{ route('borrows.store') }}" method="post">
                @csrf
                <div class="mb-3 form-group">
                    <label for="book_id" class="form-lable @error('book_id') is-invalid @enderror">Book Title</label>
                    <select name="book_id" id="book_id" class="form-control">
                        <option value="" disabled>Select One</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                    @error('book_id')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="user_id" class="form-lable @error('user_id') is-invalid @enderror">Member</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="" disabled>Select One</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="borrow_date" class="form-lable @error('borrow_date') is-invalid @enderror">Borrow
                        Date</label>
                    <input type="date" name="borrow_date" id="borrow_date" class="form-control"
                        placeholder="Enter quantity">
                    @error('borrow_date')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="return_date" class="form-lable @error('return_date') is-invalid @enderror">Return
                        Date</label>
                    <input type="date" name="return_date" id="return_date" class="form-control"
                        placeholder="Enter quantity">
                    @error('return_date')
                       <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="due_date" class="form-lable @error('due_date') is-invalid @enderror">Due
                        Date</label>
                    <input type="date" name="due_date" id="due_date" class="form-control" placeholder="Enter quantity">
                    @error('due_date')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>



@endsection
