<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('index'))->name('home');

/*
|--------------------------------------------------------------------------
| Временный деплой-роут (на хостинге нет SSH)
|--------------------------------------------------------------------------
| Запускает whitelist artisan-команд через браузер.
| Включается только если в .env задан DEPLOY_KEY.
|
|   https://<сайт>/__deploy?key=<DEPLOY_KEY>              — список команд
|   https://<сайт>/__deploy/migrate?key=<DEPLOY_KEY>      — конкретная команда
|
| УДАЛИТЬ этот блок (или убрать DEPLOY_KEY из .env) после настройки сервера.
*/
Route::get('/__deploy/{command?}', function (Illuminate\Http\Request $request, ?string $command = null) {
    $key = config('app.deploy_key');
    abort_if(blank($key), 404);
    abort_unless(is_string($request->query('key')) && hash_equals($key, $request->query('key')), 403, 'Bad key');

    $commands = [
        'clear'          => ['optimize:clear', []],                 // config+cache+route+view+events
        'config-clear'   => ['config:clear', []],
        'cache-clear'    => ['cache:clear', []],
        'route-clear'    => ['route:clear', []],
        'view-clear'     => ['view:clear', []],
        'cache-build'    => ['optimize', []],                       // config+route+view cache
        'migrate'        => ['migrate', ['--force' => true]],
        'migrate-status' => ['migrate:status', []],
        'seed-news'      => ['db:seed', ['--class' => 'Database\Seeders\NewsSeeder', '--force' => true]],
        'storage-link'   => ['storage:link', []],
        'about'          => ['about', []],
    ];

    if ($command === null) {
        return response("Доступные команды:\n  ".implode("\n  ", array_keys($commands))
            ."\n\nВызов: /__deploy/<команда>?key=...", 200)
            ->header('Content-Type', 'text/plain; charset=utf-8');
    }

    abort_unless(isset($commands[$command]), 404, 'Неизвестная команда');
    [$artisan, $params] = $commands[$command];

    try {
        $exit = Artisan::call($artisan, $params);
        $body = "$ php artisan $artisan\n\n".Artisan::output()."\n[exit $exit]";
        $status = $exit === 0 ? 200 : 500;
    } catch (\Throwable $e) {
        $body = "$ php artisan $artisan\n\nОШИБКА: ".$e->getMessage();
        $status = 500;
    }

    return response($body, $status)->header('Content-Type', 'text/plain; charset=utf-8');
})->where('command', '[a-z-]+');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['kz', 'ru', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// О нас
Route::get('/about', fn () => view('pages.about'))->name('about');
Route::get('/about/mission', fn () => view('pages.mission'))->name('mission');
Route::get('/about/administration', fn () => view('pages.administration'))->name('administration');
Route::get('/about/teachers', fn () => view('pages.teachers'))->name('teachers');
Route::get('/about/self-assessment', fn () => view('pages.self-assessment'))->name('self-assessment');
Route::get('/contacts', fn () => view('pages.contacts'))->name('contacts');

// Учебный процесс
Route::get('/education', fn () => view('pages.education'))->name('education');
Route::get('/education/curriculum', fn () => view('pages.curriculum'))->name('curriculum');
Route::get('/education/schedule', fn () => view('pages.schedule'))->name('schedule');
Route::get('/education/clil', fn () => view('pages.clil'))->name('clil');
Route::get('/education/clubs', fn () => view('pages.clubs'))->name('clubs');
Route::get('/education/assessment-schedule', fn () => view('pages.assessment-schedule'))->name('assessment-schedule');
Route::get('/education/ent-results', fn () => view('pages.ent-results'))->name('ent-results');

// Прочие страницы
Route::get('/gallery', fn () => view('pages.gallery'))->name('gallery');
Route::get('/news', function () {
    return view('pages.news', [
        'news' => \App\Models\News::published()->orderByDesc('published_at')->orderByDesc('id')->get(),
    ]);
})->name('news');
Route::get('/news/{news:slug}', function (\App\Models\News $news) {
    abort_unless($news->is_published, 404);
    return view('pages.news-show', ['news' => $news]);
})->name('news.show');
Route::get('/cafeteria', fn () => view('pages.cafeteria'))->name('cafeteria');
Route::get('/vacancies', fn () => view('pages.vacancies'))->name('vacancies');
Route::get('/faq', fn () => view('pages.faq'))->name('faq');
