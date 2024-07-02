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
            $table->foreignId('author_id')->constrained('App\Models\User')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->on('categories')->onDelete('cascade');
           

          
            $table->timestamps();
        });
        Schema::create($prefix.'posts', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->foreignId('user_id') ->constrained('App\Models\User')->onUpdate('cascade')->onDelete('cascade');
      
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


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { $prefix= config('table.table_prefix');
        Schema::dropIfExists($prefix.'threads');
        Schema::dropIfExists($prefix.'posts');
        Schema::dropIfExists($prefix.'categories');
    }
};
