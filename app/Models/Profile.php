<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
     
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        'page'       => 'required',
        'explain' => 'required',

    );

    public function shops()
    {
        return $this->hasMany('App\Models\Shop');
    }
}
