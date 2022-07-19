<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SitemapXmlController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostsController::class, 'mainpage']);

Route::get('/sitemap.xml', [SitemapXmlController::class, 'index']);


//Объекты
Route::get('/{slug1}/{slug2}', [PostsController::class, 'object']);
//Категории и подкатегории
Route::get('/{slug}', [PostsController::class, 'index']);

// Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');