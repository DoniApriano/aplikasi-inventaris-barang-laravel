<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = "code";
    public $incrementing = false;

    protected $fillable = [
        "code",
        "name",
        "username",
        "password",
        "phone_number",
        "address",
        "role_id",
        "supplier_id",
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            $latestUser = static::latest()->first();

            if ($latestUser) {
                $latestCode = $latestUser->kode_barang;
                $newCode = "USR" . str_pad((int)substr($latestCode, 3) + 1, 3, "0", STR_PAD_LEFT);
            } else {
                $newCode = "USR001";
            }

            $user->code = $newCode;
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "password",
        "remember_token",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "email_verified_at" => "datetime",
        "password" => "hashed",
    ];
}
