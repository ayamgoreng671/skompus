<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view("books.index", [
            "books" => Book::latest()->get(),
            "categories" => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("books.create", [
            "books" => Book::latest()->get(),
            "authors" => Author::latest()->get(),
            "categories" => Category::latest()->get(),
            "publishers" => Publisher::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            "author" => ["required"],
            "publisher" => ["required"],
            "category" => ["required"],
            "title" => ["required"],
            "isbn" => ["required"],
            "cover" => ["required"],
            "description" => ["required"],
            "release_date" => ["required"]
        ]);
        Book::create([
            "author_id" => $request->author,
            "publisher_id" => $request->publisher,
            "category_id" => $request->category,
            "title" => $request->title,
            "isbn" => $request->isbn,
            "slug" => Str::slug($request->title),
            "is_borrowed" => 0,
            "cover" => $request->file("cover")->store("books", "public"),
            "description" => $request->description,
            "release_date" => $request->release_date,

        ]);

        
        session()->flash('success', 'Berhasil menambahkan data buku');

        return to_route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view("books.show", [
            "book" => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
    public function borrow(Book $book)
    {
        return view("books.borrow", [
            "students" => Student::all(),
            "book" => $book
        ]);
    }

    
    public function confirm(Book $book, Student $student)
    {
        return view("books.confirm", [
            "student" => $student,
            "book" => $book
        ]);
    }

    public function search(Request $request){

        // $this->validate($request, [
        //     "search" => ["required"],

        // ]);
        // dd($request);
        $request->validate([
            "search" => ["required"],
        ]);
        $target = $request->search;
        // dd($target);
        $books = Book::select()
                    ->where("title","LIKE","%$target%")
                    ->get();
        // dd($books);
        return view("books.search", [
            "books" => $books,
            "authors" => Author::latest()->get(),
            "publishers" => Publisher::latest()->get()
        ]);
    }
    public function category(Category $category){
        $books = Book::where("category_id", $category->id)->get();

        return view("books.category",[
            "category" => $category,
            "books" => $books,
        ]);
    }
}

