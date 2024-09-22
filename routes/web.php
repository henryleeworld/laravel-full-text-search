<?php

use App\Http\Controllers\ItemSearchController;
use Illuminate\Support\Facades\Route;

Route::get('items-lists', [ItemSearchController::class, 'index'])->name('items-lists');
Route::post('create-item', [ItemSearchController::class, 'create'])->name('create-item');
