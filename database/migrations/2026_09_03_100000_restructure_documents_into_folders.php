<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Turns the flat "document categories" into a nested folder tree
 * (the "Аттестация" section). No production data existed yet, so this
 * simply swaps the parent table rather than migrating rows.
 */
return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('document_folders')) {
            Schema::create('document_folders', function (Blueprint $table) {
                $table->id();
                $table->foreignId('parent_id')->nullable()
                    ->constrained('document_folders')->cascadeOnDelete();

                $table->string('title_kz')->nullable();
                $table->string('title_ru');
                $table->string('title_en')->nullable();

                $table->unsignedInteger('sort')->default(0);
                $table->boolean('is_published')->default(true);
                $table->timestamps();

                $table->index(['parent_id', 'is_published', 'sort']);
            });
        }

        if (Schema::hasColumn('documents', 'document_category_id')) {
            Schema::table('documents', function (Blueprint $table) {
                $table->dropConstrainedForeignId('document_category_id');
            });
        }

        Schema::dropIfExists('document_categories');

        if (! Schema::hasColumn('documents', 'document_folder_id')) {
            Schema::table('documents', function (Blueprint $table) {
                $table->foreignId('document_folder_id')->nullable()->after('id')
                    ->constrained('document_folders')->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('documents', 'document_folder_id')) {
            Schema::table('documents', function (Blueprint $table) {
                $table->dropConstrainedForeignId('document_folder_id');
            });
        }

        Schema::dropIfExists('document_folders');

        if (! Schema::hasTable('document_categories')) {
            Schema::create('document_categories', function (Blueprint $table) {
                $table->id();
                $table->string('title_kz')->nullable();
                $table->string('title_ru');
                $table->string('title_en')->nullable();
                $table->unsignedInteger('sort')->default(0);
                $table->boolean('is_published')->default(true);
                $table->timestamps();
            });
        }

        if (! Schema::hasColumn('documents', 'document_category_id')) {
            Schema::table('documents', function (Blueprint $table) {
                $table->foreignId('document_category_id')->nullable()
                    ->constrained()->cascadeOnDelete();
            });
        }
    }
};
