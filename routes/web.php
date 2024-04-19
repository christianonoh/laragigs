<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// Show all listings
Route::get('/', [ListingsController::class, 'index']);

// Create Listing
Route::get('/listings/create', [ListingsController::class, 'create'])->middleware('auth');

// Edit Listing
Route::get('/listings/{listing}/edit', [ListingsController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingsController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingsController::class, 'delete'])->middleware('auth');

// Store Listing
Route::post('/listings', [ListingsController::class, 'store'])->middleware('auth');

// Show a single listing
Route::get("/listings/{listing}", [ListingsController::class, 'show'])->where('id', '[0-9-]+');

// Manage Listings
Route::get("/manage-listings", [ListingsController::class, 'manage'])->middleware('auth');

// Show registration form
Route::get("/register", [UserController::class, 'create'])->middleware('guest');

// Store user
Route::post("/register", [UserController::class, 'store'])->middleware('guest');

// Show Login Form
Route::get("/login", [UserController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post("/users/authenticate", [UserController::class, 'authenticate'])->middleware('guest');

// Log User Out
Route::post("/logout", [UserController::class, 'logout'])->middleware('auth');
