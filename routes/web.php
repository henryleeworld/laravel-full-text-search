<?php

use App\Http\Controllers\ItemSearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('items-lists', [ItemSearchController::class, 'index'])->name('items-lists');
Route::post('create-item', [ItemSearchController::class, 'create'])->name('create-item');
