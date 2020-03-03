<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                ->references('id')->on('company')
                ->onDelete('cascade');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onDelete('cascade');

            $table->string('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
