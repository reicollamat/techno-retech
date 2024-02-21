<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Monitor extends Model
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
        'screen_size',
        'resolution',
        'refresh_rate',
        'response_time',
        'panel_type',
        'aspect_ratio',
        'image',
        'description',
        'status',
        'condition',
        'purchase_count',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'resolution' => 'array',
    ];
}
