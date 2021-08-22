<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'quantity',
        'categories_id',
        'price',
        'composition',
        'file',
        'size'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'file' => 'array',
    ];

    public function categoryid()
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }
}
