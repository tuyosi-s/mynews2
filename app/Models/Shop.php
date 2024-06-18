<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');

    public static $rules = array(
        //'profile_id' => 'required',
        'shop_name' => 'required',
        //'tel' => 'integer',
        'tel' => 'numeric|digits_between:10,11',
        'address'=> 'required',
        'url'=>'required',
              
    );
    
    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
    
    public function profile() {
        return $this->belongsTo('App\Models\Profile');
    }
}