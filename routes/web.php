<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\singlePagecontroller;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\ViewsController;

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
});

require __DIR__.'/auth.php';


//dashboard for user
Route::get('/user-dashboard',function(){
    return view('user-dashboard');
})->middleware(['auth','verified','user-dashboard'])->name('user.dashboard');

Route::get('/admin-dashboard',function(){
    return view('admin-dashboard');
})->middleware(['auth','verified','admin'])->name('admin.dashboard');

Route::get('/super-admin-dashboard',function(){
    return view('super-admin-dashboard');
})->middleware(['auth','verified','super-admin'])->name('super.admin.dashboard');

Route::get('/super-admin-single-page',[singlePagecontroller::class,'singlePage'])->middleware('auth','verified','super-admin');

Route::get('/view',[ViewsController::class,'viewPage']);
