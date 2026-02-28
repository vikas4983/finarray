<div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($books->count())
                @foreach ($books as $count => $book)
                    <tr>
                        <td>{{ $count + 1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->quantity }}</td>
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
            @else
                <tr>
                    <td colspan="5">No Records Found!</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $books->links() }}
</div>
