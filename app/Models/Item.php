<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'shop_id' => 'required',
        'item_name' => 'required',
        'comment'=> 'required',
        'score' => 'integer',
              
    );
    
     public function shop() {
        return $this->belongsTo('App\Models\Shop');
     }
    
}
