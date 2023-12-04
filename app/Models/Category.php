<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $fillable = [
        'code', 'name',
    ];

    protected static function booted()
    {
        static::creating(function ($category) {
            $latestCategory = static::latest()->first();

            if ($latestCategory) {
                $latestCode = $latestCategory->code;
                $newCode = 'KTG' . str_pad((int)substr($latestCode, 3) + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $newCode = 'KTG001';
            }

            $category->code = $newCode;
        });
    }

}
