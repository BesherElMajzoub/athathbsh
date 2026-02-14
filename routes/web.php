<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RobotsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Standalone Landing Pages

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
// Dedicated Service Pages
Route::get('/buy-used-furniture', fn() => view('services.buy-used-furniture'))->name('services.furniture');
Route::get('/buy-air-conditioners', fn() => view('services.buy-air-conditioners'))->name('services.ac');
Route::get('/buy-restaurant-equipment', fn() => view('services.buy-restaurant-equipment'))->name('services.restaurant');
Route::get('/buy-cafe-equipment', fn() => view('services.buy-cafe-equipment'))->name('services.cafe');
Route::get('/buy-used-appliances', fn() => view('services.buy-used-appliances'))->name('services.appliances');
Route::get('/buy-hotel-furniture', fn() => view('services.buy-hotel-furniture'))->name('services.hotel');
Route::get('/buy-warehouse-clearance', fn() => view('services.buy-warehouse-clearance'))->name('services.warehouse');
Route::get('/buy-used-carpets', fn() => view('services.buy-used-carpets'))->name('services.carpets');
Route::get('/buy-palace-furniture', fn() => view('services.buy-palace-furniture'))->name('services.palace');
Route::get('/buy-scrap-jeddah', fn() => view('services.buy-scrap-jeddah'))->name('services.scrap');
Route::get('/buy-afsh-jeddah', fn() => view('services.buy-afsh-jeddah'))->name('services.afsh');

// Redirects for Old Routes
Route::redirect('/services/buy-used-furniture', '/buy-used-furniture', 301);
Route::redirect('/services/buy-air-conditioners', '/buy-air-conditioners', 301);
Route::redirect('/services/buy-restaurant-equipment', '/buy-restaurant-equipment', 301);
Route::redirect('/services/buy-cafe-equipment', '/buy-cafe-equipment', 301);
Route::redirect('/services/buy-used-appliances', '/buy-used-appliances', 301);
Route::redirect('/services/buy-hotel-furniture', '/buy-hotel-furniture', 301);
Route::redirect('/services/buy-warehouse-clearance', '/buy-warehouse-clearance', 301);
Route::redirect('/services/buy-used-carpets', '/buy-used-carpets', 301);
Route::redirect('/services/buy-palace-furniture', '/buy-palace-furniture', 301);

// About & Contact
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:10,1')->name('contact.store');

// Location
Route::get('/location', [PageController::class, 'location'])->name('location');

// FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Jeddah Areas
Route::get('/jeddah/north', [AreaController::class, 'show'])->name('areas.north')->defaults('areaSlug', 'north');
Route::get('/jeddah/south', [AreaController::class, 'show'])->name('areas.south')->defaults('areaSlug', 'south');
Route::get('/jeddah/east', [AreaController::class, 'show'])->name('areas.east')->defaults('areaSlug', 'east');
Route::get('/jeddah/west', [AreaController::class, 'show'])->name('areas.west')->defaults('areaSlug', 'west');

// Tracking Routes
Route::get('/t/whatsapp', [TrackingController::class, 'whatsapp'])->name('track.whatsapp');
Route::get('/t/call', [TrackingController::class, 'call'])->name('track.call');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    // ->middleware(\App\Http\Middleware\AdminTokenMiddleware::class)
    ->name('admin.dashboard');

// SEO
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [RobotsController::class, 'index'])->name('robots');

// Legal
Route::get('/privacy-policy', [LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/terms', [LegalController::class, 'terms'])->name('legal.terms');

Route::fallback(function () {
    return response()
        ->view('errors.404', [], 404)
        ->header('X-Robots-Tag', 'noindex, nofollow');
});
