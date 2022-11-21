<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'desc', 'inform', 'isPrivate', 'category_id'];
    protected $primaryKey = 'news.id';
}
