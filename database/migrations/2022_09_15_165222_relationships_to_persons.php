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
        // Schema::table('people', function(Blueprint $table) {
        //     if (!Schema::hasColumn('people', 'intiperu_id')) {
        //         $table->foreignId('intiperu_id')->references('id')->on('intiperus')->onDelete('cascade');
        //         }
                
        // });

        Schema::table('people', function(Blueprint $table) {
            if (!Schema::hasColumn('people', 'created_by_id')) {
                $table->foreignId('created_by_id')->references('id')->on('users')->onDelete('cascade');
                }                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
