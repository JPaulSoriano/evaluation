<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $fillable = [
        'name', 'quarter'
    ];

    public function evaluations(){
        return $this->hasMany('App\Evaluation');
    }
}
