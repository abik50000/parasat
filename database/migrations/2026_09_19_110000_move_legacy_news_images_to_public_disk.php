<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * The admin FileUpload only sees files on the "public" disk, so news that still
 * point at public/images/... showed an empty "Картинка" field on the edit form.
 * Copy those files into storage/app/public/news and repoint the rows.
 */
return new class extends Migration
{
    public function up(): void
    {
        $disk = Storage::disk('public');

        DB::table('news')->get(['id', 'image'])->each(function ($row) use ($disk) {
            $image = (string) $row->image;

            if (! str_starts_with($image, 'images/') && ! str_starts_with($image, 'img/')) {
                return;
            }

            $source = public_path($image);

            if (! is_file($source)) {
                return;
            }

            $target = 'news/'.basename($image);

            if (! $disk->exists($target)) {
                $disk->put($target, file_get_contents($source), 'public');
            }

            DB::table('news')->where('id', $row->id)->update(['image' => $target]);
        });
    }

    public function down(): void
    {
        // Files stay where they are; the legacy paths are not restored.
    }
};
