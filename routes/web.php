<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Livewire\RegistrationIndex;
use App\Livewire\RegistrationMember;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/members/{member}', [HomeController::class, 'memberDetail'])->name('member.detail');
Route::get('/project/{slug}', [HomeController::class, 'detail'])->name('project.show');
Route::get('/projects/all', [ProjectController::class, 'index'])->name('projects.all');

Route::get('/register', RegistrationIndex::class)->name('register.index');
Route::get('/register/{type}', RegistrationMember::class)->name('register');
