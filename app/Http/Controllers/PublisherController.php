<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("publishers.index", [
            "publishers" => Publisher::latest()->get()
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
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     "name" => ["required"],
        //     "address" => ["required"]
        // ]);

        $request->validate([
            "name" => ["required"],
            "address" => ["required"]
        ]);

        Publisher::create([
            "name" => $request->name,
            "address" => $request->address
        ]);

        session()->flash('success', 'Berhasil menambahkan publisher');

        return to_route('publishers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("publishers.edit", [
            "publisher" => Publisher::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $this->validate($request, [
        //     "name" => ["required"],
        //     "address" => ["required"]
        // ]);

        $request->validate([
            "name" => ["required"],
            "address" => ["required"]
        ]);
        
        $publisher = Publisher::find($id);

        $publisher->update([
            "name" => $request->name,
            "address" => $request->address
        ]);

        session()->flash('success', 'Berhasil memperbarui publisher');

        return to_route('publishers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publisher = Publisher::find($id);

        $publisher->delete();

        session()->flash('danger', 'Berhasil menghapus publisher');

        return to_route('publishers.index');
    }
}
