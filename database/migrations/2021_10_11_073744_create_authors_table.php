<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('lastname');
          $table->year('year_birth');
          $table->year('year_died')->nullable();
          $table->unsignedBigInteger('user_id')->nullable()->default(1);
          $table->softDeletes();
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users')
                                                      ->onDelete('cascade')
                                                      ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
