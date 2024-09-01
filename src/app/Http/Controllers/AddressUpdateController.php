<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressUpdateController extends Controller
{
    public function showAddressUpdateView()
    {
        $user = Auth::user();
        return view("address-update", compact("user"));
    }

    public function addressChangeStore(AddressUpdateRequest $request)
    {
        $user = User::find(Auth::id());
        $zip_code = $request->input("zip-code");
        $address = $request->input("address");
        $building_name = $request->input("building-name");

        $user->updateUserAddress($user, $zip_code, $address, $building_name);
        return redirect(route("items.list"));
    }
}
