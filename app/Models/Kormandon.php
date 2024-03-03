<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kormandon extends Model
{
    protected $fillable=[
      'dastgoh',
      'name',
      'lastname',
      'nasab',
      'vazifa',
      'shoxis',
      'utoq',
      'doxili',
      'xizmati',
      'mobili',
      'sobiq',
      'email',
      'teleg',
        'department_id',
        'embassies_id',
        'dipservices_id'

    ];
    public function departmentD()
    {
        return $this->belongsTo(Department::class, 'department_id','id');
    }

    public function embassy()
    {
        return $this->belongsTo(Embassy::class, 'embassies_id', 'id');
    }

    public function dipservices()
    {
        return $this->belongsTo(Dipservice::class, 'dipservices_id','id');
    }

}
