<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingStoreRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ListingController extends Controller
{
    public function showListingView()
    {
        $categories = Category::all();
        $item_statuses = ItemStatus::all();
        return view("listing", compact("categories", "item_statuses"));
    }

    public function storeListingItem(ListingStoreRequest $request)
    {
        $image = $request->file("image");
        $category = $request->input("category");
        $item_status = $request->input("item-status");
        $item_name = $request->input("item-name");
        $item_brand_name = $request->input("item-brand-name");
        $item_description = $request->input("item-description");
        $item_price = $request->input("sales-price");
        $lisiting_user = Auth::id();

        Log::debug($lisiting_user);

        Item::storeItem($item_status, $item_name, $item_brand_name,
        $item_description, $item_price, $image, [$category], $lisiting_user);

        return redirect(route("items.list"));
    }
}
