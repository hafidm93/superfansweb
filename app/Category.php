<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function mvideo()
    {
        return $this->belongsToMany('App\Mvideo', 'mvideo_category');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
