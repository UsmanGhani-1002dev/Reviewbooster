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
        if (!Schema::hasTable('contact_submissions')) {
            Schema::create('contact_submissions', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email');
                $table->string('phone')->nullable();
                $table->string('business_name')->nullable();
                $table->enum('inquiry_type', ['general', 'support', 'sales', 'billing', 'partnership', 'feedback']);
                $table->string('subject');
                $table->text('message');
                $table->ipAddress('ip_address')->nullable();
                $table->text('user_agent')->nullable();
                $table->timestamp('read_at')->nullable();
                $table->text('admin_notes')->nullable();
                $table->enum('status', ['new', 'in_progress', 'resolved', 'closed'])->default('new');
                $table->timestamps();

                // Indexes for better performance
                $table->index(['email', 'created_at']);
                $table->index(['inquiry_type', 'created_at']);
                $table->index(['status', 'created_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};
