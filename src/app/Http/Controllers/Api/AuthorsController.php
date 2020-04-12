<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorsController extends Controller
{
    public function index()
    {
        return Author::orderBy('id')->get();
    }

    public function create(Request $request)
    {
        return Author::createOrFail($request->all());
    }

    public function store($id, Request $request)
    {
        return Author::updateOrFail($id, $request->all());
    }

    public function delete($id)
    {
        return Author::deleteOrFail($id);
    }}
