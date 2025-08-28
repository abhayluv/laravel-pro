<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MasterFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings', [SettingsController::class, 'index'])->middleware('verified')->name('settings.index');
    Route::post('/settings/configuration', [SettingsController::class, 'updateConfiguration'])->middleware('verified')->name('settings.configuration.update');

// Test route for configuration
Route::get('/test-configuration', function () {
    $configuration = \App\Models\Configuration::getCurrent();
    $css = $configuration->generateCSS();
    
    return view('test-configuration', [
        'configuration' => $configuration,
        'css' => $css
    ]);
})->name('test.configuration');
    Route::middleware('verified')->prefix('settings')->name('roles.')->group(function () {
        Route::get('roles', [RolesController::class, 'index'])->name('index');
        Route::get('roles/create', [RolesController::class, 'create'])->name('create');
        Route::post('roles', [RolesController::class, 'store'])->name('store');
        Route::get('roles/{role}/edit', [RolesController::class, 'edit'])->name('edit');
        Route::put('roles/{role}', [RolesController::class, 'update'])->name('update');
        Route::delete('roles/{role}', [RolesController::class, 'destroy'])->name('destroy');
    });
    Route::middleware('verified')->prefix('settings')->name('users.')->group(function () {
        Route::get('users/create', [UsersController::class, 'create'])->name('create');
        Route::post('users', [UsersController::class, 'store'])->name('store');
        Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('edit');
        Route::put('users/{user}', [UsersController::class, 'update'])->name('update');
        Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('destroy');
    });
    
    // Master Form routes
    Route::middleware('verified')->name('master-forms.')->group(function () {
        Route::get('master-forms', [MasterFormController::class, 'index'])->name('index');
        Route::get('master-forms/create', [MasterFormController::class, 'create'])->name('create');
        Route::post('master-forms', [MasterFormController::class, 'store'])->name('store');
        Route::get('master-forms/{masterForm}', [MasterFormController::class, 'show'])->name('show');
        Route::get('master-forms/{masterForm}/edit', [MasterFormController::class, 'edit'])->name('edit');
        Route::put('master-forms/{masterForm}', [MasterFormController::class, 'update'])->name('update');
        Route::delete('master-forms/{masterForm}', [MasterFormController::class, 'destroy'])->name('destroy');
        Route::patch('master-forms/{masterForm}/toggle-status', [MasterFormController::class, 'toggleStatus'])->name('toggle-status');
    });
});

require __DIR__.'/auth.php';
