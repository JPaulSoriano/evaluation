<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'evaluator_id', 'faculty_id','section_id', 'subject_id', 'academic_year', 'quarter'
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

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function academic_year(){
        return $this->belongsTo('App\AcademicYear');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'evaluation_question')->withPivot('rate')->withTimestamps();
    }

}
