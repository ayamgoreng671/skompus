<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("authors.index", [
            "authors" => Author::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     "name" => ["required"],
        //     "photo" => ["required"]
        // ]);

        $request->validate([
            "name" => ["required"],
            "photo" => ["required"]
        ]);

        Author::create([
            "name" => $request->name,
            "photo" =>  $request->file("photo")->store("authors", "public")
        ]);

        session()->flash('success', 'Berhasil menambahkan author');

        return to_route('authors.index');
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
        return view("authors.edit", [
            "author" => Author::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $this->validate($request, [
        //     "name" => ["required"],
        //     "photo" => ["required"]
        // ]);
        
        $request->validate([
            "name" => ["required"],
            "photo" => ["required"]
        ]);

        $author = Author::find($id);

        $author->update([
            "name" => $request->name,
            "photo" =>  $request->file("photo")->store("authors", "public")
        ]);

        session()->flash('success', 'Berhasil memperbarui author');

        return to_route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);

        $author->delete();

        session()->flash('danger', 'Berhasil menghapus author');

        return to_route('authors.index');
    }
}
