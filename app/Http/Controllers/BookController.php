<?php

namespace App\Http\Controllers;
use App\Models\Books;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return view('welcome',compact('books'));
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
        $validated = $request->validate([
            'title'         => 'required',
            'publish_year'  => 'nullable|integer',
            'author_name'   => 'required|string|max:255',
            'email'  => 'required|email|max:255|unique:authors,email',
        ]);
        $author = Author::create([
            'name'  => $validated['author_name'],
            'email' => $validated['email'],
        ]);

        Books::create([
            'title'         => $validated['title'],
            'publish_year'  => $validated['publish_year'],
            'author_id'     => $author->id
        ]);
        return redirect()->back()->with('success', 'تمت إضافة الكتاب بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $name)
    {
        $books = $name->books;
        return $books;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Books::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'publish_year' => 'nullable|integer',
            'author_name' => 'required|string|max:255',
        ]);
    
        $book = Books::findOrFail($id);
    
        $book->update([
            'title' => $validated['title'],
            'publish_year' => $validated['publish_year'],
        ]);
        $author = Author::findOrFail($book->author_id);
        $author->update([
            'name' => $validated['author_name'],
        ]);
    
        return redirect()->back()->with('success', 'Book updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $book = Books::findOrFail($id);
        $book->delete();
    
       
        $author = Author::findOrFail($book->author_id);
        if ($author->books()->count() === 0) {
            $author->delete();
        }
    
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}