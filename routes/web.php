<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\FlightInformationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class,'gotoWelcome'])->name('welcome');

Route::get('/AboutUs', [AboutUsController::class, 'gotoAboutUs'])->name('AboutUs');
Route::get('/ContactUs', [ContactUsController::class, 'gotoContactUs'])->name('ContactUs');
Route::get('/Downloads', [DownloadsController::class, 'gotoDownloads'])->name('Download');
Route::get('/Gallery', [GalleryController::class, 'gotoGallery'])->name('Gallery');
Route::get('/FlightInformation', [FlightInformationController::class, 'gotoFlightInfo'])->name('FlightInfo');
// In routes/web.php
Route::get('/loadData', [FlightInformationController::class, 'loadData'])->name('FlightInfo.loadData');

Route::get('/sendMail', action: [MailController::class, 'sendMail'])->name('mailSender');
