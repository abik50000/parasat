<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * The three legacy news items that used to live in lang/{locale}/pages.php.
     */
    public function run(): void
    {
        $items = [
            [
                'slug' => 'no-to-violence-legal-awareness',
                'category' => 'events',
                'image' => 'images/parasat/auditorium.jpg',
                'published_at' => '2025-11-15',
                'title_ru' => '«Насилию — нет»: правовое просвещение учащихся',
                'title_kz' => '«Зорлық-зомбылыққа жол жоқ»: оқушыларға құқықтық түсіндірме жүргізілді',
                'title_en' => '«No to Violence»: Legal Awareness Session for Students',
                'body_ru' => 'В школе прошло мероприятие «Насилию нет: правовая ответственность и механизмы защиты». Участие принял сотрудник ювенальной полиции г. Шымкент, старший лейтенант полиции Р. Сматилла, который провёл разъяснительную работу о видах насилия, включая сталкинг, нарушение личных границ, правовую ответственность и способы защиты своих прав.',
                'body_kz' => '«Зорлық-зомбылыққа жол жоқ: құқықтық, жауапкершілік және қорғау тетіктері» тақырыбында түсіндірме жұмыстары жүргізілді. Іс-шараға Шымкент қаласы Абай аудандық полиция басқармасының Ювеналды полиция бөлімінің қызметкері, полиция аға лейтенанты Р. Сматілла қатысты.',
                'body_en' => 'A seminar titled "No to Violence: Legal Responsibility and Protection Mechanisms" was held at the school. A juvenile police officer from the Abai District Police Department of Shymkent, Senior Lieutenant R. Smatilla, explained types of violence, including stalking, personal boundary violations, legal consequences, and ways to protect one\'s rights.',
            ],
            [
                'slug' => 'zakladchiki-mat-documentary',
                'category' => 'events',
                'image' => 'images/parasat/auditorium2.jpg',
                'published_at' => '2025-12-10',
                'title_ru' => 'В школе показали документальный фильм «Закладчики Мать»',
                'title_kz' => '«Закладчики Мать» деректі фильмі мектебімізде оқушыларға көрсетілді',
                'title_en' => 'Documentary Film «Zakladchiki Mat» Screened for Students',
                'body_ru' => 'По координации Генеральной прокуратуры РК в школе был показан документальный фильм «Закладчики Мать». Фильм наглядно показал тяжёлые последствия наркопреступности для общества, семьи и личности, а также правовую ответственность за действия «закладчика».',
                'body_kz' => 'Қазақстан Республикасы Бас прокуратурасының үйлестіруімен түсірілген «Закладчики Мать» деректі фильмі мектебімізде оқушыларға көрсетілді. Фильм арқылы есірткі қылмысының қоғамға, отбасыға және жеке тұлғаның өміріне тигізетін ауыр зардаптары нақты мысалдар арқылы түсіндірілді.',
                'body_en' => 'Coordinated by the General Prosecutor\'s Office of Kazakhstan, the documentary «Zakladchiki Mat» was screened for students. The film illustrated the severe consequences of drug crime for society, families and individuals, as well as the legal responsibility for drug-courier activities.',
            ],
            [
                'slug' => 'alim-aibyr-zerde-first-place',
                'category' => 'achievements',
                'image' => 'images/parasat/steam_startup.jpg',
                'published_at' => '2026-01-31',
                'title_ru' => 'Алим Айбар занял 1-е место на республиканском конкурсе «Зерде»!',
                'title_kz' => 'Алим Айбар «Зерде» республикалық конкурсынан 1-орын алды!',
                'title_en' => 'Alim Aibyr Wins 1st Place at the Republican «Zerde» Competition!',
                'body_ru' => 'Алим Айбар Азаматулы завоевал 1-е место на республиканском этапе конкурса научных проектов «Зерде»! Тема проекта: «SmartEco: концепция автономного экологического дома». Научный руководитель: Бимуратова Бибинур. Республиканский этап прошёл в ДОЦ «Балдаурен», г. Щучинск (28.01–31.01.2026).',
                'body_kz' => 'Алим Айбар Азаматұлы – «Зерде» ғылыми жобалар конкурсының республикалық кезеңінен жүлделі 1 орынды иеленді! Ғылыми жобаның тақырыбы: «SmartEco: автономды экологиялық үй концепциясы». Республикалық кезең «Балдәурен» орталығында өтті (28.01.2026 – 31.01.2026).',
                'body_en' => 'Alim Aibyr Azamatuly won 1st place at the republican stage of the «Zerde» science project competition! Project title: "SmartEco: Concept of an Autonomous Eco-Home". Scientific supervisor: Bimuratova Bibinur. The republican stage was held at the «Baldauiren» REC in Shchuchinsk (28.01–31.01.2026).',
            ],
        ];

        foreach ($items as $item) {
            News::updateOrCreate(
                ['slug' => $item['slug']],
                $item + [
                    'is_published' => true,
                    'excerpt_ru' => $item['body_ru'],
                    'excerpt_kz' => $item['body_kz'],
                    'excerpt_en' => $item['body_en'],
                ],
            );
        }
    }
}
