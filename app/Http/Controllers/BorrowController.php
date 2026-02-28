<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowCreateRequest;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [new Middleware('permission:view borrows', only: ['index', 'show']), new Middleware('permission:create borrows', only: ['create', 'store']), new Middleware('permission:edit borrows', only: ['edit', 'update']), new Middleware('permission:delete borrows', only: ['destroy'])];
    }
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $borrows = Borrow::latest()->paginate(10);
        } else {
            $borrows = Borrow::where('user_id', auth()->id())
                ->latest()
                ->paginate(10);
        }

        return view('borrows.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('id', '!=', 1)->get();
        $books = Book::all();
        return view('borrows.create', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BorrowCreateRequest $request)
    {
        $validatedData= $request->validated();
        $borrowDate = Carbon::parse($validatedData['borrow_date']) ?? now();
        $returnDate = Carbon::parse($validatedData['return_date']) ?? now()->subDays(7);
        if ($returnDate > $borrowDate) {
            Borrow::create($validatedData);
        } else {
            return redirect()->back()->with('error', 'Enter valid return date');
        }

        return redirect()->back()->with('success', 'Record has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        $users = User::where('id', '!=', 1)->get();
        $books = Book::all();
        return view('borrows.edit', compact('borrow', 'users', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BorrowCreateRequest $request, Borrow $borrow)
    {
        $validatedData= $request->validated();
        $borrowDate = Carbon::parse($validatedData['borrow_date']) ?? now();
        $returnDate = Carbon::parse($validatedData['return_date']) ?? now()->subDays(7);

        if ($returnDate > $borrowDate) {
            $borrow->update($request->all());
        } else {
            return redirect()->back()->with('success', 'Enter valid return date');
        }

        return redirect()->route('borrows.index')->with('success', 'Record has benn updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->back()->with('error', 'Record has been deleted successfully');
    }
}
