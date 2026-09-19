<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * The "Аттестация" page is now a plain list of named links to Google Drive
 * folders, replacing the folder tree + uploaded files. The old
 * `document_folders` / `documents` tables are left untouched.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attestation_links', function (Blueprint $table) {
            $table->id();

            $table->string('title_kz')->nullable();
            $table->string('title_ru');
            $table->string('title_en')->nullable();

            $table->string('url', 2048);

            $table->unsignedInteger('sort')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();

            $table->index(['is_published', 'sort']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attestation_links');
    }
};
