<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'evaluator_id', 'faculty_id','section_id'
    ];

    public function faculty()
    {
        return $this->belongsTo(User::class, 'faculty_id');
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class, 'evaluator_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'evaluation_question')->withPivot('rate')->withTimestamps();
    }

}
