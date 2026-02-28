<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCreateRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::with('category');

        if ($request->ajax()) {
            if ($request->search) {
                $books->where('title', 'like', '%' . $request->search . '%');
            }

            $books = $books->paginate(10);

            return response()->json(['html' => view('books.table', compact('books'))->render()]);
        } else {
            $books = $books->paginate(10);

            return view('books.index', compact('books'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookCreateRequest $request)
    {
        $validatedData = $request->validated();
        Book::create($validatedData);
        return redirect()->back()->with('success', 'Record has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('categories', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookCreateRequest $request, Book $book)
    {

        $validatedData = $request->validated();
        $book->update($validatedData);
        return redirect()->route('books.index')->with('success', 'Record has benn updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with('error', 'Record has been deleted successfully');
    }
}
