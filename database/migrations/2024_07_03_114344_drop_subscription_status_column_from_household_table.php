<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSubscriptionStatusColumnFromHouseholdTable extends Migration
{
    public function up()
    {
        Schema::table('households', function (Blueprint $table) {
            $table->dropColumn('subscription_status');
        });
    }

    public function down()
    {
        Schema::table('household', function (Blueprint $table) {
            $table->string('subscription_status')->nullable(); // Recreate column if needed
        });
    }
}
