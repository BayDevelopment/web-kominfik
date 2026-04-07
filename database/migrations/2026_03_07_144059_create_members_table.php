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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->year('intake_year')->index();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->string('email')->unique();
            $table->string('phone');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // 🔥 optional combo index
            $table->index(['team_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
