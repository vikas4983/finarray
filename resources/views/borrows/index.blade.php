@extends('layouts.main-app')
@section('title', 'Borrow')
@section('header', 'Borrow')
@section('content')
    <div class="">
        @include('alerts.alert')
        @can('create borrows')
            <a href="{{ route('borrows.create') }}" class="btn btn-info" style="color: white">Add Borrow</a>
        @endcan
        <div class="container mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Name</th>
                        <th>User</th>
                        <th>Borrow Date</th>
                        <th>Due Date</th>
                        <th>Return Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrows as $count => $borrow)
                        <tr>
                            <td>{{ $count + 1 }}</td>
                            <td>{{ $borrow->book->title }}</td>
                            <td>{{ $borrow->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($borrow->due_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($borrow->return_date)->format('d M Y') }}</td>
                            @can('edit borrows')
                                <td class="d-flex gap-2">
                                    <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('borrows.destroy', $borrow->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            @endcan

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $borrows->links() }}
        </div>
    </div>
@endsection
