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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
      
            $table->text('replay');
            $table->string('author_name');
            $table->string('avatar')->nullable();
            $table->string('best_answer')->default('no');
            $table->unsignedInteger('likes')->default(0);
            $table->unsignedInteger('replay_post_id')->nullable();
            $table->foreignId('thread_id')->constrained()->on('threads')->onDelete('cascade');
            $table->foreignId('auth_id')->constrained()->on('auths')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
