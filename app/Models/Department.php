<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
      'name',
      'email',
      'dastgoh'
    ];

    public function kormandon()
    {
        return $this->hasOne(Kormandon::class);
    }

}
