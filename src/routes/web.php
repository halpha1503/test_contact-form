<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get("/", [ContactController::class, "index"]);
Route::post("/confirm", [ContactController::class, "confirm"]);
Route::get('/thanks', function () {
    return redirect('/');
});
Route::post('/thanks', [ContactController::class, 'thanks']);
