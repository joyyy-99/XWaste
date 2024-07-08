<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHouseholdNameToHouseholdsTable extends Migration
{
    public function up()
    {
        Schema::table('households', function (Blueprint $table) {
            $table->string('household_name')->nullable();
        });
    }

    public function down()
    {
        Schema::table('households', function (Blueprint $table) {
            $table->dropColumn('household_name');
        });
    }
}
