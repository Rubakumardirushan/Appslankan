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
        $prefix= config('table.table_prefix');
        Schema::create($prefix.'threads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->boolean('sloved')->nullable();

            $table->integer('reply_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->foreignId('author_id')->constrained(config('table.user_model'))->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->on('categories')->onDelete('cascade');
            $table->string('category_name')->nullable();
            $table->string('author_name')->nullable();
            $table->timestamps();
        });
        Schema::create($prefix.'posts', function (Blueprint $table) {

            $table->id();
            $table->text('content');
            $table->string('user_name')->nullable();
            $table->foreignId('user_id') ->constrained(config('table.user_model'))->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('thread_id')->constrained()->on('threads')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create($prefix.'categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });
        Schema::create($prefix.'thread_read', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id') ->constrained(config('table.thread_model'))->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained(config('table.user_model'))->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { $prefix= config('table.table_prefix');
        Schema::dropIfExists($prefix.'threads');
        Schema::dropIfExists($prefix.'posts');
        Schema::dropIfExists($prefix.'categories');
        Schema::dropIfExists($prefix.'thread_read');
    }
};
