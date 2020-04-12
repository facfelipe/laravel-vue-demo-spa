<?php

namespace App\Models;

class Book extends Model
{
    CONST READING_STATUS_WAITING = 0;
    CONST READING_STATUS_READING = 1;
    CONST READING_STATUS_FINISHED = 2;
    CONST READING_STATUS_REREDING = 3;
    CONST READING_STATUS_GIVEN_UP = 4;

    protected $fillable = [
        'name',
        'synopsis',
        'year_published_at',
        'author_id',
        'total_pages',
        'readed_page_at',
        'status'
    ];

    protected $rules = [
        'name' => 'required',
        'year_published_at' => 'nullable|digits:4|integer',
        'author_id' => 'required',
        'total_pages' => 'nullable|integer',
        'readed_page_at' => 'nullable|integer|lte:total_pages',
        'status' => 'required'
    ];

    protected $messages = [
        'name.required' => 'O nome é obrigatório',
        'year_published_at.digits' => 'O ano deve possuir 4 dígitos',
        'year_published_at.integer' => 'Insira apenas números',
        'author_id.required' => 'O autor é obrigatório',
        'total_pages.integer' => 'Número inválido',
        'readed_page_at.integer' => 'Número inválido',
        'readed_page_at.lte' => 'Número superior ao total',
        'status.required' => 'O status é obrigatório',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}

