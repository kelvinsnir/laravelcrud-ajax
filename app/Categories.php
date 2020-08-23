<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function article(){
    	$this->hasMany('App\Article');
    }
}
