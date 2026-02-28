@extends('layouts.main-app')
@section('title', 'borrows')
@section('header', 'Edit borrow')
@section('content')
    <div>
        {{-- <a href="{{ route('borrows.update') }}" class="btn btn-info">Edit borrow</a> --}}

        <div class="container">
            <form action="{{ route('borrows.update', $borrow->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3 form-group">
                    <label for="title" class="form-lable">Book Title</label>
                    <select name="book_id" id="book_id" class="form-control">
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                {{ $book->title }}</option>
                        @endforeach
                    </select>
                    @error('book_id')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="title" class="form-lable">Member</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="borrow_date" class="form-lable">Borrow Date</label>
                    <input type="date" value="{{ $borrow->borrow_date }}" name="borrow_date" id="borrow_date"
                        class="form-control" placeholder="Enter quantity">
                    @error('borrow_date')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="due_date" class="form-lable">Due Date</label>
                    <input type="date" value="{{ $borrow->due_date }}" name="due_date" id="due_date"
                        class="form-control" placeholder="Enter quantity">
                    @error('due_date')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="return_date" class="form-lable">Return Date</label>
                    <input type="date" value="{{ $borrow->return_date }}" name="return_date" id="due_date"
                        class="form-control" placeholder="Enter quantity">
                    @error('return_date')
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
