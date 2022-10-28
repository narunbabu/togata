<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('villages', function (Blueprint $table) {
            if (!Schema::hasColumn('name','mandal_id')) {
                // $table->unsignedBigInteger('mandal_id');
                $table->foreignId('mandal_id')->references('id')->on('mandals')->onDelete('cascade');
                $table->unique('name', 'mandal_id');
                
                }
        });
       

       

        Schema::table('villages', function(Blueprint $table) {
            if (!Schema::hasColumn('name', 'created_by_id')) {
                $table->foreignId('created_by_id')->references('id')->on('users')->onDelete('cascade');
                }                
        });

        // Schema::table('villages', function(Blueprint $table) {
        //     if (!Schema::hasColumn('name', 'intiperu_id')) {
        //         $table->foreignId('intiperu_id')->references('id')->on('intiperus')->onDelete('cascade');
        //         }                
        // });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('villages', function (Blueprint $table) {
            //
        });
    }
};
