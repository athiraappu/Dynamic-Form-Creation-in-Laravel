<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtmlFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('html_form', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->integer('form_id');
            $table->string('label')->nullable();
            $table->text('html_control')->nullable();
            $table->text('html_field')->nullable();
            $table->string('control')->nullable();            
            $table->string('comments')->nullable();
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('html_form');
    }
}
