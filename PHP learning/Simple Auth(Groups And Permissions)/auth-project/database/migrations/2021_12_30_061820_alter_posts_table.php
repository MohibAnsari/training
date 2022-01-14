<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->bigInteger('deleted_by')->nullable();
            // $table->unsignedBigInteger('created_by');
            // $table->unsignedBigInteger('updated_by');
            // $table->unsignedBigInteger('deleted_by');
    //         $table->foreignId('created_by')
    //         // ->nullable()
    //         ->constrained()->onDelete('cascade');
    //         $table->foreignId('updated_by')
    // //   ->nullable()
    //   ->constrained()->onDelete('cascade');
    //   $table->foreignId('deleted_by')
    // //   ->nullable()
    //   ->constrained()->onDelete('cascade');
            // $table->foreign('created_by')->references('id')->on('users');
            // $table->foreign('updated_by')->references('id')->on('users');
            // $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voids
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
