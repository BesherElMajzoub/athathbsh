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
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\AdminDashboardController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/buy-used-furniture', [ServiceController::class, 'show'])->name('services.furniture')->defaults('serviceSlug', 'buy-used-furniture');
Route::get('/services/buy-air-conditioners', [ServiceController::class, 'show'])->name('services.ac')->defaults('serviceSlug', 'buy-air-conditioners');
Route::get('/services/buy-restaurant-equipment', [ServiceController::class, 'show'])->name('services.restaurant')->defaults('serviceSlug', 'buy-restaurant-equipment');
Route::get('/services/buy-cafe-equipment', [ServiceController::class, 'show'])->name('services.cafe')->defaults('serviceSlug', 'buy-cafe-equipment');
Route::get('/services/buy-used-appliances', [ServiceController::class, 'show'])->name('services.appliances')->defaults('serviceSlug', 'buy-used-appliances');
Route::get('/services/buy-hotel-furniture', [ServiceController::class, 'show'])->name('services.hotel')->defaults('serviceSlug', 'buy-hotel-furniture');
Route::get('/services/buy-warehouse-clearance', [ServiceController::class, 'show'])->name('services.warehouse')->defaults('serviceSlug', 'buy-warehouse-clearance');

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
    ->middleware(\App\Http\Middleware\AdminTokenMiddleware::class)
    ->name('admin.dashboard');

// SEO
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [RobotsController::class, 'index'])->name('robots');

// Legal
Route::get('/privacy-policy', [LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/terms', [LegalController::class, 'terms'])->name('legal.terms');
