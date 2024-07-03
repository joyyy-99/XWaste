<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');

            // Add foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['user_id']);

            // Then drop the column
            $table->dropColumn('user_id');
        });
    }
}
