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
        Schema::create('thread__views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id')->constrained()->on('threads')->onDelete('cascade');
            $table->foreignId('auth_id')->constrained()->on('auths')->onDelete('cascade');
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thread__views');
    }
};
