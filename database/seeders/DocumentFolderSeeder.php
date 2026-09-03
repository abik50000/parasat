<?php

namespace Database\Seeders;

use App\Models\DocumentFolder;
use Illuminate\Database\Seeder;

class DocumentFolderSeeder extends Seeder
{
    /** Starter folder tree for the "About us → Аттестация" page. */
    public function run(): void
    {
        $teachers = DocumentFolder::firstOrCreate(
            ['parent_id' => null, 'title_ru' => 'Аттестация педагогов'],
            ['title_kz' => 'Педагогтарды аттестаттау', 'title_en' => 'Teacher attestation', 'sort' => 0],
        );

        foreach (['2024–2025', '2023–2024', '2022–2023'] as $i => $year) {
            DocumentFolder::firstOrCreate(
                ['parent_id' => $teachers->id, 'title_ru' => $year],
                ['title_kz' => $year, 'title_en' => $year, 'sort' => $i],
            );
        }

        DocumentFolder::firstOrCreate(
            ['parent_id' => null, 'title_ru' => 'Аттестация организации образования'],
            ['title_kz' => 'Білім беру ұйымын аттестаттау', 'title_en' => 'School attestation', 'sort' => 1],
        );

        DocumentFolder::firstOrCreate(
            ['parent_id' => null, 'title_ru' => 'Нормативные документы'],
            ['title_kz' => 'Нормативтік құжаттар', 'title_en' => 'Regulatory documents', 'sort' => 2],
        );
    }
}
