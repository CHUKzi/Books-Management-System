<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BooksController extends Controller
{
    /*
    * Books Page Index
    */
    public function index(Request $request)
    {
        //Get books categories
        $categories = BookCate::all();

        // filter by category
        if($request->category)
            //Get book list request has category id
            $books = Book::select('books.id', 'books.title', 'books.author', 'books.price', 'books.stock', 'book_cate.name as category')
            ->join('book_cate', 'books.book_category_id', '=', 'book_cate.id')
            ->where('books.book_category_id', $request->category)
            ->whereNull('books.deleted_at')
            ->whereNull('book_cate.deleted_at')
            ->get();
        else{
            //Get aa book list
            $books = Book::select('books.id', 'books.title', 'books.author', 'books.price', 'books.stock', 'book_cate.name as category')
            ->join('book_cate', 'books.book_category_id', '=', 'book_cate.id')
            ->whereNull('books.deleted_at')
            ->whereNull('book_cate.deleted_at')
            ->get();
        }
        return view('books.index', compact('categories', 'books'));
    }

    /*
    * Books Create Page
    */
    public function create()
    {
        //Get books categories
        $categories = BookCate::all();
        return view('books.create', compact('categories'));
    }

    /*
    * Books Store
    */
    public function store(BookRequest $request)
    {
        try {
            $book = new Book();
            $book->title = $request->input('book_title');
            $book->author = $request->input('book_author');
            $book->price = $request->input('book_price');
            $book->stock = $request->input('book_stock');
            $book->book_category_id = $request->input('book_category');
            $book->save();

            // Send back to book list page
            return redirect()->route('books.index')->with('success', 'Book created successfully.');
        } catch (\Exception $e) {
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            return back()->withInput()->with('error', 'Created Failed');
        }
    }

    /*
    * Books Edit Page
    */
    public function edit($id)
    {
        $book = Book::find($id);
        if($book){
            $categories = BookCate::all();
            return view('books.edit', compact('book', 'categories'));
        } else {
            return redirect()->route('books.index')->with('error', 'Book Not Found!');
        }
    }

    /*
    * Books Update
    */
    public function update(BookRequest $request, $id)
    {
        try {
            $book = Book::find($id);
            $book->title = $request->input('book_title');
            $book->author = $request->input('book_author');
            $book->price = $request->input('book_price');
            $book->stock = $request->input('book_stock');
            $book->book_category_id = $request->input('book_category');
            $book->update();

            // Send back to book list page
            return redirect()->route('books.index')->with('success', 'Book Updated successfully.');
        } catch (\Exception $e) {
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            return back()->withInput()->with('error', 'Update Failed');
        }
    }

    /*
    * Books Destroy
    */
    public function destroy(Request $request, $id)
    {
        try {
            Book::find($id)->delete();
            // Send back to book list page
            return redirect()->route('books.index')->with('success', 'Book Deleted successfully.');
        } catch (\Exception $e) {
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            return back()->withInput()->with('error', 'Deleted Failed');
        }
    }
}
