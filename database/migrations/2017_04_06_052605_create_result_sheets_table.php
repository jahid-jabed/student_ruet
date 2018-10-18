<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roll');
            $table->string('name');
            $table->string('department');
            $table->float('gp', 4, 2);
            $table->float('earned_credit', 4, 2);
            $table->float('gpa', 3, 2);
            $table->float('total_earned_credit', 5, 2);
            $table->float('cgpa', 3, 2);
            $table->string('failed');
            $table->string('x_graded');
            $table->boolean('publish');
            $table->string('year');
            $table->string('semester');
            $table->integer('examination');
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
        Schema::dropIfExists('result_sheets');
    }
}
