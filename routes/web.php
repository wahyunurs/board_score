<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManageEventController;
use App\Http\Controllers\Admin\ManageStageController;
use App\Http\Controllers\Admin\ManageTeamsController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\ManageStagesController;
use App\Http\Controllers\Admin\ManageHeadersController;
use App\Http\Controllers\Admin\ManageSponsorsController;
use App\Http\Controllers\Admin\ManageMediaPartnersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestController::class, 'index'])->name('guest.index');

// Routes for admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Dashboard route
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Routes for manage events
        Route::prefix('kelola-acara')->group(function () {
            Route::get('/', [ManageEventController::class, 'index'])->name('manage-events.index');
            Route::put('{id}', [ManageEventController::class, 'update'])->name('manage-events.update');
        });

        // Routes for manage headers
        Route::prefix('kelola-header')->group(function () {
            Route::get('/', [ManageHeadersController::class, 'index'])->name('manage-headers.index');
            Route::put('{id}', [ManageHeadersController::class, 'update'])->name('manage-headers.update');
        });

        // Routes for manage sponsors
        Route::prefix('kelola-sponsor')->group(function () {
            Route::get('/', [ManageSponsorsController::class, 'index'])->name('manage-sponsors.index');
            Route::post('/', [ManageSponsorsController::class, 'store'])->name('manage-sponsors.store');
            Route::put('{id}', [ManageSponsorsController::class, 'update'])->name('manage-sponsors.update');
            Route::delete('{id}', [ManageSponsorsController::class, 'destroy'])->name('manage-sponsors.destroy');
        });

        // Routes for manage media partners
        Route::prefix('kelola-media-partner')->group(function () {
            Route::get('/', [ManageMediaPartnersController::class, 'index'])->name('manage-media-partners.index');
            Route::post('/', [ManageMediaPartnersController::class, 'store'])->name('manage-media-partners.store');
            Route::put('{id}', [ManageMediaPartnersController::class, 'update'])->name('manage-media-partners.update');
            Route::delete('{id}', [ManageMediaPartnersController::class, 'destroy'])->name('manage-media-partners.destroy');
        });

        // Routes for manage users
        Route::get('kelola-pengguna', [ManageUsersController::class, 'index'])->name('manage-users.index');

        // Routes for manage teams
        Route::prefix('kelola-tim')->group(function () {
            Route::get('/', [ManageTeamsController::class, 'index'])->name('manage-teams.index');
            Route::post('{id}/update-score', [ManageTeamsController::class, 'updateScore'])->name('admin.teams.updateScore');
            Route::get('{id}/score', [ManageTeamsController::class, 'getScore']);
            Route::post('/', [ManageTeamsController::class, 'store'])->name('manage-teams.store');
            Route::put('{id}', [ManageTeamsController::class, 'update'])->name('manage-teams.update');
            Route::delete('{id}', [ManageTeamsController::class, 'destroy'])->name('manage-teams.destroy');
        });

        // Routes for manage stages
        Route::prefix('kelola-stage')->group(function () {
            Route::get('/', [ManageStageController::class, 'index'])->name('manage-stages.index');
            Route::put('{id}', [ManageStageController::class, 'update'])->name('manage-stages.update');
        });
    });
});

// Routes for user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/dashboard/{teamId}/score', [UserController::class, 'getScore']);
});

// Route for logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('');
})->name('logout');


require __DIR__ . '/auth.php';
