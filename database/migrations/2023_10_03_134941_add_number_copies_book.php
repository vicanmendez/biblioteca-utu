<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumberCopiesBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table( 'books', function ( Blueprint $table ) {
            $table->integer( 'number_copies' )->default( 1 );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        if ( Schema::hasColumn( 'books', 'number_copies' ) ) {
            Schema::table( 'books', function ( Blueprint $table ) {
                $table->dropColumn( 'number_copies' );
            } );
        }
    }
}
