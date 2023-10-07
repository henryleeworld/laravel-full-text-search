<?php

use App\Http\Controllers\ItemSearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('items-lists', [ItemSearchController::class, 'index'])->name('items-lists');
Route::post('create-item', [ItemSearchController::class, 'create'])->name('create-item');
