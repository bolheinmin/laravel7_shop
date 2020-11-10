<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name','category_id'];
    protected $table = "sub_categories";

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function items()
    {
        return $this->hasMany('App\Item','subcategory_id');
    }
}
