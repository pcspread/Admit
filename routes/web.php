<?php

use Illuminate\Support\Facades\Route;
// Controller読込
use App\Http\Controllers\TopController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MailController;

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

/* ======================================================================
勤怠管理
====================================================================== */
// view表示：勤怠管理ページ
Route::get('/attendance', [AttendanceController::class, 'createAttendance']);

// 勤務開始、終了処理
Route::post('/attendance', [AttendanceController::class, 'storeAttendance']);

// 休憩開始、終了処理
Route::patch('/attendance', [AttendanceController::class, 'storeBreakAttendance']);

// view表示：勤怠一覧ページ
Route::get('/attendance/list/', [AttendanceController::class, 'indexAttendance']);

// view表示：時間外一覧ページ
Route::get('/attendance/over', [AttendanceController::class, 'indexOverAttendance']);

/* ======================================================================
休暇申請
====================================================================== */
// view表示：休暇申請ページ
Route::get('/holiday', [HolidayController::class, 'createHoliday']);

// 休暇申請処理
Route::post('/holiday', [HolidayController::class, 'storeHoliday']);

// view表示：休暇申請一覧ページ
Route::get('/holiday/list', [HolidayController::class, 'indexHoliday']);

// 休暇申請承認処理
Route::post('/holiday/list/{holiday_id}', [HolidayController::class, 'updateHoliday']);

/* ======================================================================
日報報告
====================================================================== */
// view表示：日報報告ページ
Route::get('/report', [ReportController::class, 'createReport']);

// 日報報告処理
Route::post('/report', [ReportController::class, 'storeReport']);

// view表示：日報一覧ページ
Route::get('/report/list', [ReportController::class, 'indexReport']);

// 日報報告確認処理
Route::post('/report/list/{report_id}', [ReportController::class, 'updateReport']);

// view表示：日報詳細ページ
Route::get('/report/detail/{report_id}', [ReportController::class, 'showReport']);

/* ======================================================================
メール通知
====================================================================== */
// view表示：メール通知ページ
Route::get('/mail', [MailController::class, 'createMail']);