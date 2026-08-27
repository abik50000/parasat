<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('image');

            $table->string('title_kz')->nullable();
            $table->string('title_ru');
            $table->string('title_en')->nullable();

            $table->text('excerpt_kz')->nullable();
            $table->text('excerpt_ru')->nullable();
            $table->text('excerpt_en')->nullable();

            $table->longText('body_kz')->nullable();
            $table->longText('body_ru')->nullable();
            $table->longText('body_en')->nullable();

            $table->boolean('is_published')->default(true);
            $table->date('published_at')->nullable();
            $table->timestamps();

            $table->index(['is_published', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
