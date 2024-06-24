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
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('channel');
            $table->unsignedInteger('replies_count')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->string('solved')->default('no');
            $table->string('avatar')->nullable();
            $table->string('author_name');
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
        Schema::dropIfExists('threads');
    }
};
