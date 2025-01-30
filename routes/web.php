<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageTeamsController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

// Routes for admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Routes for manage teams
    Route::get('/admin/manage-teams', [ManageTeamsController::class, 'index'])->name('manage-teams.index');
    Route::post('/admin/manage-teams/{id}/update-score', [ManageTeamsController::class, 'updateScore'])->name('admin.teams.updateScore');
    Route::post('/admin/manage-teams', [ManageTeamsController::class, 'store'])->name('manage-teams.store');
    Route::put('/admin/manage-teams/{id}', [ManageTeamsController::class, 'update'])->name('manage-teams.update');
    Route::delete('/admin/manage-teams/{id}', [ManageTeamsController::class, 'destroy'])->name('manage-teams.destroy');

    // Routes for manage users
    Route::get('/admin/manage-users', [ManageUsersController::class, 'index'])->name('manage-users.index');
    Route::post('/admin/manage-users', [ManageUsersController::class, 'store'])->name('manage-users.store');
    Route::put('/admin/manage-users/{id}', [ManageUsersController::class, 'update'])->name('manage-users.update');
    Route::delete('/admin/manage-users/{id}', [ManageUsersController::class, 'destroy'])->name('manage-users.destroy');
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
