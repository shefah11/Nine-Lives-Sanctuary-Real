<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('location');          // Last seen area (e.g., Mahallah Aminah)
            $table->text('description');        // Description of cat health/injury
            $table->string('photo_path')->nullable(); // Saved image filename location
            $table->string('status')->default('Pending'); // Case management: Pending, Investigating, Resolved
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Linked reporter ID
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};