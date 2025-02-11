<?php
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('welcome'); // Point vers votre vue principale
})->where('any', '.*'); // Cette expression régulière permet de capturer toutes les routes