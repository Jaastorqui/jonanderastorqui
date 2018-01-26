<?php

namespace App;

use App\Comunity;
use App\Province;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    
    public function byComunity($comunity) 
    {
    	return $this->hasOne(Province::class, "id", "province_id");
    }
}
