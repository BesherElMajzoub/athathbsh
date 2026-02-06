<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RobotsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/الخدمات', [ServiceController::class, 'index'])->name('services.index');
Route::get('/الخدمات/{serviceSlug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/الأسئلة-الشائعة', [FaqController::class, 'index'])->name('faq');

Route::get('/مناطق-الخدمة', [AreaController::class, 'index'])->name('areas.index');
Route::get('/مناطق-الخدمة/{areaSlug}', [AreaController::class, 'show'])->name('areas.show');

Route::get('/من-نحن', [PageController::class, 'about'])->name('about');
Route::get('/موقعنا', [PageController::class, 'location'])->name('location');

Route::get('/تواصل-معنا', [ContactController::class, 'show'])->name('contact.show');
Route::post('/تواصل-معنا', [ContactController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('contact.store');

Route::get('/سياسة-الخصوصية', [LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/الشروط-والأحكام', [LegalController::class, 'terms'])->name('legal.terms');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [RobotsController::class, 'index'])->name('robots');
