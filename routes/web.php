<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', WelcomeController::class)->name('welcome');

Route::prefix('admin')
    ->group(function () {
        Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
        Volt::route('/projects', 'pages.projects.index')->name('project.index');
    });
