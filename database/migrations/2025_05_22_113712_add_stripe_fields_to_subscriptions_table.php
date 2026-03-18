<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('stripe_payment_intent_id')->unique()->nullable()->after('subscription_plan_id');
            $table->string('stripe_customer_id')->nullable()->after('stripe_payment_intent_id');
            $table->string('stripe_status')->nullable()->after('stripe_customer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn(['stripe_payment_intent_id', 'stripe_customer_id', 'stripe_status']);
        });
    }
};
