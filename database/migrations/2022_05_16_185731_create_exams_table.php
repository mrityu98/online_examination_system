<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('subject');
            $table->string('department');
            $table->string('year');
            $table->string('semester');
            $table->date('date');
            $table->time('start_time');
            $table->string('duration');
            $table->string('t_question');
            $table->string('r_mark')->default(1);
            $table->string('n_mark')->default(.25);
            $table->Integer('teacher_id');
            $table->string('teacher');
            $table->string('is_admin')->default(1);// This is checking wheather user or admin  
            $table->Integer('status')->default(0);
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
        Schema::dropIfExists('exams');
    }
}
