<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookPlace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add book_place to books table
        Schema::table('books', function (Blueprint $table) {
            $table->string('book_place')->nullable()->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
            //Drop book_place from books table
            Schema::table('books', function (Blueprint $table) {
                $table->dropColumn('book_place');
            });
    }
}
