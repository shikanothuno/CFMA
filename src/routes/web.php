<?php

use App\Http\Controllers\AddressUpdateController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Route::get("/","showItemList")->name("items.list");
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
    Route::get("/{item}/item-purchase","showPurchaseItem")->middleware("auth")->name("item.purchase");
});

Route::controller(FavoriteController::class)->middleware("auth")->group(function () {
    Route::post("/{item}/toggle-favorite", "toggleFavorite")->name("toggle.favorite");
});

Route::controller(AddressUpdateController::class)->middleware("auth")->group(function () {
    Route::get("/update-address","showAddressUpdateView")->name("address.update.show");
    Route::put("/update-address","addressChangeStore")->name("address.update.store");
});

Route::controller(MypageController::class)->middleware("auth")->group(function () {
    Route::get("/mypage/listing-item","showMypageListing")->name("mypage.listing");
    Route::get("/mypage/purchase-item","showMypagePurchase")->name("mypage.purchase");
});

Route::controller(ProfileSettingController::class)->middleware("auth")->group(function () {
    Route::get("/profile-setting", "profileSettingView")->name("profile.setting.view");
    Route::post("/profile-setting/update", "profileSettingUpdate")->name("profile.setting.update");
});

Route::controller(ListingController::class)->middleware("auth")->group(function () {
    Route::get("/listing-item", "showListingView")->name("listing.item.view");
    Route::post("/listing-item/store", "storeListingItem")->name("listing.item.store");
});

Route::controller(CommentController::class)->middleware("auth")->group(function () {
    Route::get("/{item}/comment","showCommentView")->name("comment.view");
    Route::post("/{item}/comment","storeComment")->name("comment.store");

});

require __DIR__.'/auth.php';
