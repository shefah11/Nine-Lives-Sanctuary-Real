<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('healths', function (Blueprint $table) {
            // Check if column exists before adding
            if (!Schema::hasColumn('healths', 'title')) {
                $table->string('title');
            }
            if (!Schema::hasColumn('healths', 'content')) {
                $table->text('content');
            }
            if (!Schema::hasColumn('healths', 'category')) {
                $table->string('category');
            }
            if (!Schema::hasColumn('healths', 'image_url')) {
                $table->string('image_url')->nullable();
            }
            if (!Schema::hasColumn('healths', 'author')) {
                $table->string('author')->default('Admin');
            }
            if (!Schema::hasColumn('healths', 'is_published')) {
                $table->boolean('is_published')->default(true);
            }
        });
    }

    public function down(): void
    {
        Schema::table('healths', function (Blueprint $table) {
            $table->dropColumn(['title', 'content', 'category', 'image_url', 'author', 'is_published']);
        });
    }
};