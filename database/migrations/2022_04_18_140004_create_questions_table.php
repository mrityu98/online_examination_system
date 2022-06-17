<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('exam_id');
            $table->string('exam_name');
            $table->string('question');
            $table->string('op_1');
            $table->string('op_2');
            $table->string('op_3');
            $table->string('op_4');
            $table->string('r_op');   
            $table->Integer('teacher_id');
            $table->string('teacher');
            $table->string('is_admin')->default(1);// This is checking wheather user or admin  
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
        Schema::dropIfExists('questions');
    }
}
