<?php

namespace App\Models;

class Author extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
    ];

    protected $messages = [
        'first_name.required' => 'O nome é obrigatório',
        'last_name.required' => 'O sobrenome é obrigatório',
    ];

}
