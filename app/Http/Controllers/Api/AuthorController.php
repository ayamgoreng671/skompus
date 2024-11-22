<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::latest()->get();
        
        return response()->json([["message" => "Data Listed Successfully !"],$authors]);
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
        $request->validate([
            "name" => ["required"],
            "photo" => ["required"]
        ]);

        $newData = Author::create([
            "name" => $request->name,
            "photo" =>  $request->file("photo")->store("authors", "public")
        ]);

       
        return response()->json([["message" => "Data Added Successfully !"],$newData]);

        // return response('authors.index')->json([]"Data berhasil ditambahkan !")->json($newData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::find($id);

        return response()->json([["message" => "Data Finded Successfully !"],$author]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => ["required"],
            // "photo" => ["required"]
        ]);

        // dd($request);

        $author = Author::find($id);

        if(isset($request->photo)){
            $updatedData = $author->update([
                "name" => $request->name,
                "photo" =>  $request->file("photo")->store("authors", "public")
            ]);

            $updatedData = Author::find($id);

        }else{
            $updatedData = $author->update([
                "name" => $request->name
            ]);
            $updatedData = Author::find($id);
        }



        return response()->json([["message" => "Data Updated Successfully !"],$updatedData]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);

        $author->delete();

        return response()->json(["message" => "Data Deleted Successfully !"]);

    }
}
