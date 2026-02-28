@extends('layouts.main-app')
@section('title', 'Categories')
@section('header', 'Categories')
@section('content')
    <div>
        @include('alerts.alert')
        <a href="{{ route('categories.create') }}" class="btn btn-info" style="color: white">Add Category</a>
        <div class="container ">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $count => $category)
                        <tr>
                            <td>{{ $count + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
