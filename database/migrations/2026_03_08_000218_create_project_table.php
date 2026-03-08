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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->string('image')->nullable();

            $table->string('category')->nullable();
            $table->string('author')->nullable();
            $table->string('collaborator')->nullable();

            $table->text('description')->nullable();

            $table->string('demo_url')->nullable();
            $table->string('github_url')->nullable();

            $table->timestamp('uploaded_at')->nullable();
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
