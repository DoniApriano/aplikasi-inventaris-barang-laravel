<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreHouse extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    public $incrementing = false;

    protected $fillable = [
        'code', 'name',
    ];

    protected static function booted()
    {
        static::creating(function ($storeHouse) {
            $latestStoreHouse = static::latest()->first();

            if ($latestStoreHouse) {
                $latestCode = $latestStoreHouse->code;
                $newCode = 'GDG' . str_pad((int)substr($latestCode, 3) + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $newCode = 'GDG001';
            }

            $storeHouse->code = $newCode;
        });
    }

}
