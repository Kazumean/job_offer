<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
Route::get('/listings/create', [ListingController::class, 'create']);

// 求人の詳細を表示する
Route::get('/listings/{listing}', [ListingController::class, 'show']);