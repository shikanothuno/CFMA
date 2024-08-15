<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function showItemList(Request $request)
    {
        $query = Item::query();
        $keyword = $request->input("keyword");
        if(!empty($keyword)){
            $query->where("item_name","LIKE","%{$keyword}%")->orWhere("item_description","LIKE","%{$keyword}%");
        }
        $items = $query->get()->all();

        return view("item-list",compact("items"));
    }

    public function showMylist()
    {
        return view("mylist");
    }

    public function showItemDetail(Request $request, Item $item)
    {
        return view("item-detail",compact("item"));
    }
}
