<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowReturn;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // dd(BorrowReturn::where("borrow_id", 1)->exists());
        return view("borrows.index", [
            "borrows" => Borrow::all(),
            "borrow_returns" => BorrowReturn::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book, Student $student)
    {

        // dd(\Carbon\Carbon::now()->addDays(7)->format("j F Y"));
        Borrow::create([
            "student_id" => $student->id,
            "book_id" => $book->id,
            "borrow_date" => \Carbon\Carbon::now()->format("Y-m-d"),
            "due_date" => \Carbon\Carbon::now()->addDays(7)->format("Y-m-d"),
        ]);

        $book->update(["is_borrowed" => 1]);

        session()->flash('success', 'Berhasil menambahkan data peminjaman');

        return to_route('borrows.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {
        return view("borrows.show", [
            "borrow" => $borrow
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
