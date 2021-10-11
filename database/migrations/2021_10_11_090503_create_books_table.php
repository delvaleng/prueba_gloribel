<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('editor');
            $table->date('date_publish');
            $table->double('price_min');
            $table->double('price');
            $table->string('description')->nullable();
            $table->enum('average', ['EXTRAORDINARIO', 'EXCELENTE', 'BUENO', 'DAÑADO'])->default('BUENO');
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
        Schema::dropIfExists('books');
    }
}
