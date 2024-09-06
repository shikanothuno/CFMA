<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileSettingRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileSettingController extends Controller
{
    public function profileSettingView()
    {
        $user = Auth::user();

        return view("profile-setting", compact("user"));
    }

    public function profileSettingUpdate(ProfileSettingRequest $request)
    {
        $user = Auth::user();
        $image = $request->file("image");

        $user_name = $request->input("name");
        $zip_code = $request->input("zip-code");
        $address = $request->input("address");
        $building_name = $request->input("building-name");

        User::profileSetting($user, $user_name, $zip_code, $address, $building_name, $image);

        return redirect(route("profile.setting.view"));
    }
}
