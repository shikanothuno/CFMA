<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ItemController::class)->group(function(){
    Route::get("/","showItemList")->name("items.list");
    Route::get("/mylist","showMylist")->name("items.mylist");
    Route::get("/{item}/detail","showItemDetail")->name("item.detail");
    Route::get("/{item}/purchase","showPurchaseItem")->name("item.purchase");
});

Route::controller(FavoriteController::class)->middleware("auth")->group(function(){
    Route::post("/{item}/toggle-favorite", "toggleFavorite")->name("toggle.favorite");
});

require __DIR__.'/auth.php';
