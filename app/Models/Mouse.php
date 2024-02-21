<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Mouse extends Model
{
    use AsSource, Filterable, HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'category',
        'name',
        'brand',
        'price',
        'tracking_method',
        'connection_type',
        'max_dpi',
        'hand_orientation',
        'color',
        'image',
        'description',
        'status',
        'condition',
        'purchase_count',
    ];
}
