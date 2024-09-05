<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function showMypageListing()
    {
        $user = Auth::user();
        $items = $user->listing_items;
        $is_listing = true;

        return view("mypage", compact("items", "is_listing"));
    }

    public function showMypagePurchase()
    {
        $user = Auth::user();
        $items = $user->purchase_items;
        $is_listing = false;

        return view("mypage", compact("items", "is_listing"));
    }
}
