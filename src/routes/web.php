<?php

use Illuminate\Support\Facades\Route;


Route::get('/{any}', 'Web\AppController@index')->where('any', '.*');
