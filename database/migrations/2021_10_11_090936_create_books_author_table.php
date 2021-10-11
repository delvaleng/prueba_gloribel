<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_author', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();

            $table->unsignedBigInteger('user_id')->nullable()->default(1);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
                                                        ->onDelete('cascade')
                                                        ->onUpdate('cascade');
            $table->foreign('book_id')->references('id')->on('books')
                                                        ->onDelete('cascade')
                                                        ->onUpdate('cascade');
            $table->foreign('author_id')->references('id')->on('authors')
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
        Schema::dropIfExists('books_author');
    }
}
