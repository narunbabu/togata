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
        Schema::table('mandals', function (Blueprint $table) {
            if (!Schema::hasColumn('name','district_id')) {

                $table->foreignId('district_id')->references('id')->on('districts')->onDelete('cascade');
                }
        });
        Schema::table('districts', function (Blueprint $table) {
            if (!Schema::hasColumn('name','state_id')) {
                $table->foreignId('state_id')->references('id')->on('states')->onDelete('cascade');
                }
        });
        Schema::table('states', function (Blueprint $table) {
            if (!Schema::hasColumn('name','country_id')) {
                $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade');
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
        Schema::table('mandals_tables', function (Blueprint $table) {
            //
        });
    }
};
