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
        Schema::create('keunikan_items', function (Blueprint $table) {
            $table->id();
            $table->string('type', 30)->default('block'); // 'block' atau 'career'
            $table->string('badge_number', 20)->nullable(); // '01', '02', '03'
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable(); // Bullet points untuk blok (dipisah baris baru)
            $table->string('image')->nullable();
            $table->string('icon', 100)->nullable(); // FontAwesome class untuk karir
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keunikan_items');
    }
};
