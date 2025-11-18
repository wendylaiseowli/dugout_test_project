<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SubscribeController;

#Navigation
#Index routes
Route::get('/', [IndexController::class, 'getMatches'])->name('index');

#Menu routes - Navigation
Route::get('/menu',[MenuController::class, 'getMenuItems'])->name('menu');

#Promotion routes
Route::get('/promotion', [PromotionController::class, 'getPromotionDetails'])->name('promotion');

#Services routes
Route::get('/service', function () {
    return view('service');
})->name('service');

#Gallery routes
Route::get('/gallery', [GalleryController::class, 'getGalleryImages'])->name('gallery');

#Events routes
Route::get('/event', function () {
    return view('event');
})->name('event');

Route::post('/event', [EventController::class, 'planEventForm'])->name('planEventForm');

#Reservation routes
Route::get('/contact-us', function () {
    return view('reservation');
})->name('reservation');
Route::post('/contact-us', [ReservationController::class, 'reserve'])->name('reserve');

#Mobile-bar routes
Route::get('/mobile-bar', function () {
    return view('mobile-bar');
})->name('mobile-bar');

#Authenticity gurantee routes
Route::get('/authenticity-guarantee', function () {
    return view('authenticity-guarantee');
})->name('authenticity-guarantee');

#Thank-you routes (after submit the event form)
Route::get('/thank-you', function () {
    return view('thankyou');
})->name('thank-you');

#Subcribtion
Route::post('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');

# Default laravel breeze given
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';