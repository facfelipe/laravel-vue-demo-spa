<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/authors', 'AuthorsController@index');
Route::post('/authors', 'AuthorsController@create');
Route::put('/authors/{id}', 'AuthorsController@store');
Route::delete('/authors/{id}', 'AuthorsController@delete');

Route::get('/books', 'BooksController@index');
Route::post('/books', 'BooksController@create');
Route::put('/books/{id}', 'BooksController@store');
Route::delete('/books/{id}', 'BooksController@delete');
