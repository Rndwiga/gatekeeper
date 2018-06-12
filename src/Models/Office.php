<?php

namespace Rndwiga\Authentication\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
  protected $fillable = [
      'name',
  ];
  public function cashflow()
    {
     // return $this->belongsTo(Cashflow::class);
     // return $this->hasMany(Office::class);
     // return $this->hasOne(Office::class);
    }

}
