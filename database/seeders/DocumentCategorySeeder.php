<?php

namespace Database\Seeders;

use App\Models\DocumentCategory;
use Illuminate\Database\Seeder;

class DocumentCategorySeeder extends Seeder
{
    /** Starter set of document groups for the "About us → Documents" page. */
    public function run(): void
    {
        $categories = [
            [
                'title_ru' => 'Уставные документы',
                'title_kz' => 'Жарғылық құжаттар',
                'title_en' => 'Founding documents',
            ],
            [
                'title_ru' => 'Лицензии и аккредитация',
                'title_kz' => 'Лицензиялар және аккредиттеу',
                'title_en' => 'Licences and accreditation',
            ],
            [
                'title_ru' => 'Локальные акты и положения',
                'title_kz' => 'Жергілікті актілер мен ережелер',
                'title_en' => 'Internal regulations and policies',
            ],
            [
                'title_ru' => 'Отчёты о самооценке',
                'title_kz' => 'Өзін-өзі бағалау есептері',
                'title_en' => 'Self-assessment reports',
            ],
            [
                'title_ru' => 'Приём в школу',
                'title_kz' => 'Мектепке қабылдау',
                'title_en' => 'Admissions',
            ],
            [
                'title_ru' => 'Антикоррупционная деятельность',
                'title_kz' => 'Сыбайлас жемқорлыққа қарсы іс-қимыл',
                'title_en' => 'Anti-corruption',
            ],
        ];

        foreach ($categories as $i => $data) {
            DocumentCategory::firstOrCreate(
                ['title_ru' => $data['title_ru']],
                $data + ['sort' => $i, 'is_published' => true],
            );
        }
    }
}
