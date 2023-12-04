<?php

use Illuminate\Support\Facades\Route;
// Controller読込
use App\Http\Controllers\TopController;

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

// view表示：トップページ
Route::get('/', [TopController::class, 'indexTop']);
