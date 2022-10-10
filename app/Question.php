<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question', 'status','category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
