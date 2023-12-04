<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    public $incrementing = false;

    protected $fillable = [
        'code', 'name', 'stock', 'condition', 'category_code'
    ];

    protected static function booted()
    {
        static::creating(function ($item) {
            $latestItem = static::latest()->first();

            if ($latestItem) {
                $latestCode = $latestItem->code;
                $newCode = 'BRG' . str_pad((int)substr($latestCode, 3) + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $newCode = 'BRG001';
            }

            $item->code = $newCode;
        });
    }
}
