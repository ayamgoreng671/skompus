<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\BorrowReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BorrowReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Borrow $borrow)
    {
        BorrowReturn::create([
            "borrow_id" => $borrow->id,
            "return_date" => Carbon::now()->format("Y-m-d"),
        ]);

        $borrow->book->update(["is_borrowed" => 0]);

        session()->flash('success', 'Berhasil menyimpan data pengembalian');

        return to_route('borrows.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowReturn $borrowReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BorrowReturn $borrowReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BorrowReturn $borrowReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BorrowReturn $borrowReturn)
    {
        //
    }
}
