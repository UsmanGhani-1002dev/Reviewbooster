<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('email');
            $table->text('review');
            $table->integer('rating'); // Rating out of 5
            $table->enum('status', ['contacted', 'resolved', 'active'])->default('active');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
