<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        return response()->json(Book::with('author')->orderBy('id')->get());
    }

    public function create(Request $request)
    {
        return Book::createOrFail($request->all());
    }

    public function store($id, Request $request)
    {
        return Book::updateOrFail($id, $request->all());
    }

    public function delete($id)
    {
        return Book::deleteOrFail($id);
    }
}
