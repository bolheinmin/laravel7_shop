<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "orderno",
        "order_date",
        "total_amout",
        "notes",
        "status",
        "user_id",
    ];

    public function items()
    {
        return $this->belongsToMany('App\Item','orderdetails')
                    ->withPivot('qty')
                    ->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
