<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\QuoteRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/request-a-quote', [QuoteRequestController::class, 'store'])->name('quote-requests.store');
Route::middleware('auth')->get('/admin/quote-requests/{quoteRequest}/pdf', [QuoteRequestController::class, 'downloadPdf'])->name('quote-requests.pdf');
Route::middleware('auth')->get('/admin/quote-requests/{quoteRequest}/sample', [QuoteRequestController::class, 'sample'])->name('quote-requests.sample');
Route::middleware('auth')->post('/admin/quote-requests/{quoteRequest}/pricing', [AdminAuthController::class, 'savePricing'])->name('quote-requests.pricing.save');
Route::middleware('auth')->post('/admin/quote-requests/{quoteRequest}/approve', [AdminAuthController::class, 'approveQuotation'])->name('quote-requests.approve');
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');
Route::middleware('auth')->get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
Route::middleware('auth')->get('/admin/reports/quotations', [AdminAuthController::class, 'quotationReport'])->name('admin.reports.quotations');
Route::middleware('auth')->post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::middleware('auth')->post('/admin/approvals/{user}', [AdminAuthController::class, 'approve'])->name('admin.approvals.approve');
Route::middleware('auth')->post('/admin/approvals/{user}/disapprove', [AdminAuthController::class, 'disapprove'])->name('admin.approvals.disapprove');
Route::middleware('auth')->get('/client-dashboard', function () {
    $user = auth()->user()->load([
        'clientProfile',
        'orders.telemetry',
        'toolingAssets',
        'reorderRequests',
    ]);

    return view('client-dashboard', compact('user'));
})->name('client.dashboard');
Route::middleware('auth')->post('/client/logout', [AuthController::class, 'logout'])->name('client.logout');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/product-collection', [HomeController::class, 'productCollection'])->name('product-collection');
Route::get('/manufacturing', [HomeController::class, 'manufacturing'])->name('manufacturing');
Route::get('/newest-in-dsam', [HomeController::class, 'newestInDsam'])->name('newest-in-dsam');
Route::get('/materials', [HomeController::class, 'materials'])->name('materials');
Route::get('/request-a-quote', [HomeController::class, 'requestAQuote'])->name('request-a-quote');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/industries', [HomeController::class, 'industries'])->name('industries');
Route::get('/product/{slug}', [HomeController::class, 'product'])->name('product.show');
Route::post('/generate', [HomeController::class, 'generate'])->name('generate');
