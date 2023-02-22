<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluator_id');
            $table->foreignId('faculty_id');
            $table->foreignId('section_id');
            $table->foreignId('subject_id');
            $table->string('academic_year');
            $table->unique(['evaluator_id', 'faculty_id', 'subject_id', 'academic_year'], 'evaluations_unique_evaluator_faculty_subject_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
