<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

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
}
