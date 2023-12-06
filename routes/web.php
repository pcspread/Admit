<?php

use Illuminate\Support\Facades\Route;
// Controller読込
use App\Http\Controllers\TopController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HolidayController;

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

// view表示：勤怠管理ページ
Route::get('/attendance', [AttendanceController::class, 'createAttendance']);

// view表示：勤怠リストページ
Route::get('/attendance/list/', [AttendanceController::class, 'indexAttendance']);

// view表示：時間外リストページ
Route::get('/attendance/over', [AttendanceController::class, 'indexOverAttendance']);

// view表示：休暇申請
Route::get('/holiday', [HolidayController::class, 'createHoliday']);

// view表示：休暇申請一覧
Route::get('/holiday/list', [HolidayController::class, 'indexHoliday']);
