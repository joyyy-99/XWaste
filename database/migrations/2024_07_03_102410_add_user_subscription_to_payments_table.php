<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserSubscriptionToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Add user_id column
            $table->unsignedBigInteger('user_id');

            // Add subscription_id column
            $table->unsignedBigInteger('subscription_id')->nullable();

            // Add foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subscription_id')->references('id')->on('subscriptions');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Drop foreign key constraints first
            $table->dropForeign(['user_id']);
            $table->dropForeign(['subscription_id']);

            // Drop columns
            $table->dropColumn('user_id');
            $table->dropColumn('subscription_id');
        });
    }
}
