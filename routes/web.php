<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', [FrontController::class, 'welcome'])->name('welcome');

Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

Route::get('/nuovo/annuncio',[AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcement.create');

Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcement.show');

Route::get('/tutti/annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('announcement.index');


// home revisore
Route::get('/revisor/home' , [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

// accetta annuncio
// Route::patch('/accetta/annuncio/{announcement}' , [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

// // rifiuta annuncio
// Route::patch('/rifiuta/annuncio/{announcement}' , [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

// // torna indietro
// Route::patch('/indietro/annuncio' , [RevisorController::class, 'goBackAnnouncement'])->middleware('isRevisor')->name('revisor.goback_announcement');

Route::patch('/cambia/stato/{announcement}/{value}', [RevisorController::class, 'changeAnnouncementStatus'])->middleware('isRevisor')->name('revisor.changeStatus');

Route::get('/revisione/annuncio/{announcement}' , [RevisorController::class, 'getAnnouncement'])->middleware('isRevisor')->name('revisor.show');


// chiedi di diventare revisore
Route::get('/richiesta/revisore' , [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

// rendi utente revisore
Route::get('/rendi/revisore/{user}' , [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/ricerca/annuncio' , [FrontController::class, 'searchAnnouncements'])->name('announcement.search');

// settare la lingua
Route::post('/lingua/{lang}' , [FrontController::class, 'setLanguage'])->name('set_language_locale');


