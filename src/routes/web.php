<?php

use App\Http\Controllers\AddressUpdateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\PaymentMethodChangeController;
use App\Http\Controllers\PaymentMethodController;
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

Route::controller(PaymentMethodChangeController::class)->middleware("auth")->group(function(){
    Route::get("/{user}/payment-method-change", "paymentMethodChange")->name("payment.method.change");
    Route::post("/{user}/payment-method-change", "paymentMethodChangeStore")->name("payment.method.store");
});

Route::controller(PaymentMethodController::class)->middleware("auth")->group(function(){
    Route::get("/{item}/payment-card", "paymentCard")->name("payment.card");
    Route::get("/{item}/payment-store", "paymentStore")->name("payment.store");
    Route::get("/{item}/payment-bank", "paymentBank")->name("payment.bank");
    Route::post("/{item}/payment-card", "paymentStripe")->name("payment.stripe");
});

Route::controller(AdminController::class)->middleware("auth")->group(function(){
    Route::get("/admin-page","adminPageShow")->name("admin.page");
    Route::delete("/admin-page/user-delete","deleteUser")->name("admin.user.delete");
    Route::delete("/admin-page/comment-delete","deleteComment")->name("admin.comment.delete");
    Route::post("admin-page/send-email","sendEmail")->name("admin.send.email");

});

require __DIR__.'/auth.php';
