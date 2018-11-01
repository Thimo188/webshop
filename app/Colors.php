<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
  public function ProductColors()
  {
    # mag veranderd worden, werkt miss niet
    return $this->hasOne(Product_Colors::class);
  }
}
