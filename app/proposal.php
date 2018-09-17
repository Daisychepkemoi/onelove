<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proposal extends Model
{
     protected $guarded=[];
     public function proposal(){
     	return $this->belongsTo(User::class);
     } 
     public function user(){ 
     	
     	return $this->belongsTo(User::class);
     }

}
