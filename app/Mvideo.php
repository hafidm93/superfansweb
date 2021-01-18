<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Mvideo extends Model
{
    use softDeletes;
    
    
    protected $guarded = ['id'];


    public function category()
    {
        return $this->belongsToMany('App\Category', 'mvideo_category');
    }
}
