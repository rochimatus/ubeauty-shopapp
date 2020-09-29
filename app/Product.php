<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'category_id', 'image', 'detail',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function review()
    {
        return $this->hasMany('App\Review');
    }
    
    public function detailOrder()
    {
        return $this->hasMany('App\DetailOrder');
    }

    public function cart()
    {
        return $this->hasMany('App\Cart');
    }
}
