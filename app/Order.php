<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'payment_status', 'shipping_status', 'address', 'total', 'note',
    ];

    public function detailOrder()
    {
        return $this->hasMany('App\DetailOrder');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
