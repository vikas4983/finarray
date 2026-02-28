@extends('layouts.main-app')
@section('title', 'Books')
@section('header', 'Books')
@section('content')
    <div class="">
        @include('alerts.alert')
        <input class="form-control" id="search" placeholder="Enter Book Name" aria-label="Search" />
        <a href="{{ route('books.create') }}" class="btn btn-info mt-3" style="color: white">Add Book</a>
        <div class="container " id="bookTableContainer">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Book Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="bookTableBody">
                    @foreach ($books as $key => $book)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->quantity }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $books->links() }}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function fetchBooks(search = '') {
                $.ajax({
                    url: "{{ route('books.index') }}",
                    data: {
                        search: search
                    },
                    success: function(result) {
                        $('#bookTableContainer').html(result.html);
                        console.log(result.html);
                    }
                });
            }
            $('#search').on('keyup', function() {
                fetchBooks($(this).val());
                console.log('search:', $(this).val());
            });


        });
    </script>
@endsection
