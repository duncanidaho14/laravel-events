<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends BaseModel
{
    /*protected $fillable = ['title', 'description'];*/

    

    public function getRouteKeyName()
    {
    	return 'id';
    }
}
