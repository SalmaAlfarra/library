<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(200); dump and diea
        $books = Book::all();
        // dd($books);
        return response()->view('cms.book.index',[
            'books' =>$books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('cms.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $book=new Book();
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'description'=> 'required|string|min:3|max:500',
            'year' => 'required',
            'price'=> 'required',
            'quntity'=> 'required',
            'active'=>'nullable|string|in:on'
            ],[
                'name.required' => 'Enter the book name please',
                'description.required' => 'Enter the book description please',
            ]);
        $book->name=$request->input('name');
        $book->description=$request->input('description');
        $book->year=$request->input('year');
        $book->price=$request->input('price');
        $book->quntity=$request->input('quntity');
        $book->active=$request->has('active');
        // dd($request->all());

        $issaved=$book->save();
        // dd($request->all());
        if($issaved){
            session()->flash('massege','Book created succssfuly');
            return redirect()->back();
            // return redirect()->route('books.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        dd('SHOW');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        // dd('EDIT');
        return response()->view('cms.book.update',['book'=> $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        dd('UPDATE');
         $request->validate([
            'name' => 'required|string|min:3|max:50',
            'description'=> 'required|string|min:3|max:500',
            'year' => 'required',
            'price'=> 'required',
            'quntity'=> 'required',
            'active'=>'nullable|string|in:on'
            ]);
        $book->name=$request->input('name');
        $book->description=$request->input('description');
        $book->year=$request->input('year');
        $book->price=$request->input('price');
        $book->quntity=$request->input('quntity');
        $book->active=$request->has('active');

        $issaved=$book->save();
        if($issaved){
            return redirect()->route('books.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        // dd('DESTROY');
        $isDeleted=$book->delete();
        // return redirect()->back();
        if($isDeleted){
            return redirect()->route('books.index');
        }
    }
}