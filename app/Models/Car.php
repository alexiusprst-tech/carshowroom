<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'price',
        'year',
        'description',
        'image',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'year'  => 'integer',
    ];

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
