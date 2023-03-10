<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes:
// index - 全ての求人を表示する
// show - 求人の詳細を表示する
// create - 新しい求人を登録するためのフォームを開く
// store - 新しい求人を保存する
// edit - 求人の詳細を編集するための画面を開く
// update - 求人の詳細を更新する
// destroy - 求人を削除する


// 全ての求人を表示する
Route::get('/', [ListingController::class, 'index']);

// 求人の新規登録画面を表示する
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// 求人の登録処理をする
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// 求人情報編集画面を表示する
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// 求人情報を編集・更新する
Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// 求人を削除する
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// 求人情報の管理ページに遷移する
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// 求人の詳細を表示する
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// ユーザー登録フォーム画面を表示する
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// ユーザーを新規登録する
Route::post('/users', [UserController::class, 'store']);

// ログインフォームを表示する
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// ログインする
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// ログアウトする
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

