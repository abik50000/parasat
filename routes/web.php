<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('index'))->name('home');

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
