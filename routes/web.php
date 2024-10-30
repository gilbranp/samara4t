<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\ListDonatorController;

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/success', function () {
    return view('success');
});

// Route::get('/donate', function () {
//     return view('donate');
// });


// Route::get('/donates', function () {
//     return view('backend.donate');
// });



Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'registershow']);
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Administrator
    Route::middleware('administrator')->group(function () {
        // manage user
        Route::resource('/manageuser', UserController::class);
        Route::post('users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::resource('/listdonate', ListDonatorController::class);
    });


    Route::get('/forum', function () {
        return view('backend.forum.forum');
    });
    Route::get('/laporan', function () {
        return view('backend.laporan.laporan');
    });
    Route::get('/managedonate', function () {
        return view('backend.donate.donate');
    });

    Route::get('/acceptdonate', function () {
        return view('backend.donate.acceptdonate');
    });
    Route::get('/profileaccept', function () {
        return view('backend.donate.profileaccept');
    });
    Route::get('/tracking', function () {
        return view('backend.donate.tracking');
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/404', function () {
    return view('404');
});

Route::resource('/donate', DonateController::class);

// Route::get('/donate',[DonateController::class,'payment'])->name('donate.payment');
// Route::get('/donate', [DonateController::class, 'index'])->name('donate.index');
// Route::post('/donate', [DonateController::class, 'store'])->name('donate');
// Route::post('/midtrans/callback', [DonateController::class, 'paymentCallback']);