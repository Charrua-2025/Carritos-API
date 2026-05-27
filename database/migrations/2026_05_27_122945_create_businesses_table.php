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
        Schema::create('businesses', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')
        ->constrained()
        ->onDelete('cascade');

    $table->foreignId('category_id')
        ->nullable()
        ->constrained()
        ->nullOnDelete();

    $table->foreignId('neighborhood_id')
        ->nullable()
        ->constrained()
        ->nullOnDelete();

    $table->string('name');

    $table->text('description')->nullable();
   

    $table->string('address');

    $table->decimal('latitude', 10, 8);
    $table->decimal('longitude', 11, 8);

    $table->string('whatsapp')->nullable();
    $table->string('phone')->nullable();

    $table->string('logo')->nullable();
    $table->string('cover_image')->nullable();

    $table->boolean('delivery_available')->default(false);

    $table->boolean('pickup_available')->default(true);

    $table->time('opening_time')->nullable();
    $table->time('closing_time')->nullable();

    $table->boolean('featured')->default(false);

    $table->enum('subscription_type', [
        'free',
        'basic',
        'premium'
    ])->default('free');

    $table->integer('views_count')->default(0);

    $table->boolean('active')->default(true);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};