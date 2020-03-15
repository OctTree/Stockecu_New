<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partial_delivery extends Model
{
    //
    protected $fillable = [
        'item_locations_id','locations_id','qty','date','note',
        ];
}
