<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function showItemList(Request $request)
    {
        $query = Item::query();
        $keyword = $request->input("keyword");
        if (!empty($keyword)) {
            $query->where("item_name", "LIKE", "%{$keyword}%")->orWhere("item_description", "LIKE", "%{$keyword}%");
        }
        $items = $query->get()->all();

        return view("item-list", compact("items"));
    }

    public function showMylist()
    {
        $user = Auth::user();
        $favorites = $user->favorites;
        return view("mylist", compact("favorites"));
    }

    public function showItemDetail(Request $request, Item $item)
    {
        return view("item-detail", compact("item"));
    }

    public function showPurchaseItem(Request $request, Item $item)
    {
        return view("item-purchase", compact("item"));
    }
}
