<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
      'streetname',
      'zipcode',
      'place',
      'country_id'
    ];
}
