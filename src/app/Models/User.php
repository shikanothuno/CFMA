<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\File;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Catch_;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        "user_zip_code",
        "user_address",
        "user_building_name",
        "image_id",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favorites()
    {
        return $this->belongsToMany(Item::class, "favorites");
    }

    public function comments()
    {
        return $this->belongsToMany(Item::class, "comments")->withPivot("comment_body");
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function listing_items()
    {
        return $this->hasMany(Item::class, "listing_user");
    }

    public function purchase_items()
    {
        return $this->hasMany(Item::class, "purchase_user");
    }

    public static function createGeneralUser($email, $password)
    {
        $user = User::create([
            "email" => $email,
            "password" => Hash::make($password),
            "is_admin" => false,
        ]);

        return $user;
    }

    public static function createAdminUser($email, $password)
    {
        User::create([
            "email" => $email,
            "password" => $password,
            "is_admin" => true,
        ]);
    }

    public static function updateUserAddress($user, $zip_code, $address, $building_name)
    {
        $user->user_zip_code = $zip_code;
        $user->user_address = $address;
        $user->user_building_name = $building_name;
        
        $user->save();
    }

    public static function profileSetting($user, $user_name, $zip_code, $address, $building_name, $image_file)
    {
        $user->updateUserAddress($user, $zip_code, $address, $building_name);
        $user->name = $user_name;
        if(!is_null($image_file)){
            $extension = $image_file->extension();

            $file_name = date("Ymd_His") . "." . $extension;
            $path = Storage::disk("s3")->putFileAs("images", $image_file, $file_name);
            
            
            $url = Storage::disk("s3")->url($path);

            $image = Image::createImage($path, $url);

            $user->image_id = $image->id;
        }
        
        $user->save();
    }
}
