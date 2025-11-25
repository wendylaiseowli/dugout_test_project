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
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

#Admin
Route::middleware('auth')->group(function () {
    #dashboard
    Route::get('/dashboard', [IndexController::class, 'showDashBoard'])->name('dashboard');

    Route::resources([
        'users' => UserController::class,
        'reservations' => ReservationController::class,
        'menus' => MenuController::class,
        'events' => EventController::class,
        'promotions' => PromotionController::class,
        'gallerys' => GalleryController::class,
        'subscribers' => SubscribeController::class,
    ]);

    Route::put('/users/{user}/active', [UserController::class, 'active'])->name('active-user');
    Route::put('/users/{user}/deactive', [UserController::class, 'deactive'])->name('deactive-user');

    Route::put('/reservations/{reservation}/active', [ReservationController::class, 'active'])->name('active-reservation');
    Route::put('/reservations/{reservation}/deactive', [ReservationController::class, 'deactive'])->name('deactive-reservation');

    Route::put('/menus/{menu}/active', [MenuController::class, 'active'])->name('active-menu');
    Route::put('/menus/{menu}/deactive', [MenuController::class, 'deactive'])->name('deactive-menu');

    Route::put('/events/{event}/active', [EventController::class, 'active'])->name('active-event');
    Route::put('/events/{event}/deactive', [EventController::class, 'deactive'])->name('deactive-event');
    
    // Route::get('/menu-add', function () {
    //     return view('menu.menu-add');
    // })->name('menu-add');

    // Route::get('/menu-edit', function () {
    //     return view('menu.menu-edit');
    // })->name('menu-edit');

    // Route::get('/event-add', function () {
    //     return view('event.event-add');
    // })->name('event-add');

    // Route::get('/event-edit', function () {
    //     return view('event.event-edit');
    // })->name('event-edit');

    // Route::get('/promo-add', function () {
    //     return view('promotion.promo-add');
    // })->name('promo-add');

    // Route::get('/promo-edit', function () {
    //     return view('promotion.promo-edit');
    // })->name('promo-edit');

    // Route::get('/gallery-add', function () {
    //     return view('gallery.gallery-add');
    // })->name('gallery-add');

    // Route::get('/gallery-edit', function () {
    //     return view('gallery.gallery-edit');
    // })->name('gallery-edit');

    // Route::get('/login', function () {
    //     return view('auth.login');
    // })->name('login');
});
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->middleware('guest')->name('password.request');
    

# Default laravel breeze given
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';