<?php
namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller {
    public function index() {
        return view('books', ['books' => Book::all()]);
    }

    public function store(Request $request) {
        Book::create($request->validate([
            'title' => 'required', 'author' => 'required', 'pages' => 'required|integer'
        ]));
        return redirect('/');
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect('/');
    }
}