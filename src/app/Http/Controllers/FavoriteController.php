<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggleFavorite(Request $request, Item $item)
    {
        $user = User::find(Auth::id());
        $is_favorite = $user->favorites->contains($item->id);
        if($is_favorite){
            $item->favorites()->detach($user->id);
        }else{
            $item->favorites()->attach($user->id);
        }

        return redirect(route("item.detail",$item));
    }
}
