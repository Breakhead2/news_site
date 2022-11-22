<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';
    protected $fillable = ['name', 'slug'];
    public $timestamps = false;
}
