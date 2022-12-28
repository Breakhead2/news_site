<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'desc', 'inform',
        'isPrivate', 'category_id', 'image', 'image_url', 'date_of_pub', 'resource_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }
}
