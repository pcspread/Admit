<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model読込
use App\Models\Attendance;
use App\Models\Rest;
// Carbon読込
use Carbon\Carbon;
use Carbon\CarbonPeriod;
// Auth読込
use Illuminate\Support\Facades\Auth;
// DB読込
use Illuminate\Support\Facades\DB;
// Log読込
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    /**
     * view表示
     * 勤怠管理ページ
     * @param void
     * @return view
     */
    public function createAttendance()
    {
        return view('attendance.create');
    }

    /**
     * 勤務開始、終了処理
     * @param object $request
     * @return back
     */
    public function storeAttendance(Request $request)
    {
        // 勤務開始が押された場合
        if ($request->attendance === 'start') {
            // 勤務中の場合
            if (session('start') === 1) {
                return back()->with('danger', '勤務中です');
            }
            
            Attendance::create([
                'user_id' => Auth::id(),
                'start_at' => Carbon::now()->__toString(),
                'date_at' => Carbon::now()->toDateString(),
            ]);

            // セッションにボタン制御用の値を格納
            session()->put('start', 1);

            // セッションにコメントを格納
            session()->flash('success', '勤務を開始しました');
        }

        // 勤務終了が押された場合
        if ($request->attendance === 'end') {
            // 勤務中でない場合
            if (!session('start')) {
                return back()->with('danger', '勤務外です');
            }
            // 休憩中の場合
            if (session('break')) {
                return back()->with('danger', '休憩中です');
            }

            // 勤怠情報の取得
            $attendance = Attendance::where('user_id', Auth::id())->orderBy('id', 'desc')->first();

            // Carbonインスタンスに変更(勤務開始)
            $start = Carbon::parse($attendance['start_at']);

            // 勤務終了時間を作成
            $base_end = Carbon::now()->__toString();

            // Carbonインスタンスに変更(勤務終了)
            $end = Carbon::parse($base_end);

            // 勤務開始から勤務終了までの時間を取得
            $diff = $start->diff($end);
            
            // update処理
            $attendance->update([
                'end_at' => $base_end,
                'total_at' => $diff->format('%H:%I:%S'),
            ]);

            // セッションのボタン制御用の値を削除
            session()->forget('start');

            // セッションにコメントを格納
            session()->flash('success', '勤務を終了しました');
        }
        
        return back();
    }

    /**
     * 休憩開始、終了処理
     * @param object $request
     * @return back
     */
    public function storeBreakAttendance(Request $request)
    {
        // 休憩開始が押された場合
        if ($request->break === 'break') {
            // 勤務外の場合
            if (!session('start')) {
                return back()->with('danger', '勤務外です');
            }

            // 休憩中の場合
            if (session('break')) {
                return back()->with('danger', '休憩中です');
            }

            // create処理
            Rest::create([
                'user_id' => Auth::id(),
                'attendance_id' => Attendance::where('user_id', Auth::id())->orderBy('id', 'desc')->first()['id'],
                'break_at' => Carbon::now()->__toString(),
            ]);

            // セッションにボタン制御用の値を格納
            session()->put('break', 1);

            // セッションにコメントを格納
            session()->flash('success', '休憩を開始しました');
        }

        // 休憩終了が押された場合
        if ($request->break === 'restart') {
            // 勤務外の場合
            if (!session('start')) {
                return back()->with('danger', '勤務外です');
            }

            // 休憩情報の取得
            $rest = Rest::where('user_id', Auth::id())->orderBy('id', 'desc')->first();

            // 休憩開始時間をCarbonインスタンスに変更
            $break = Carbon::parse($rest['break_at']);

            // 休憩終了時間を作成
            // $base_restart = '2023-12-12 00:34:00';
            $base_restart = Carbon::now()->__toString();

            // 当日の日時を取得
            $today = Carbon::now();

            // 前日の日時を取得
            $yesterday = Carbon::now()->subDay();
            
            // 休憩終了時間をCarbonインスタンスに変更
            $restart = Carbon::parse($base_restart);
            
            // 日付が23:59:59を超えている場合
            if ($break->toDateString() < $restart->toDateString()) {
                // 前日の休憩時間を取得
                $diff1 = $break->diff(Carbon::parse($yesterday->toDateString() . ' 23:59:59'));

                // トランザクション開始
                DB::beginTransaction();

                try {
                    // update処理
                    $rest->update([
                        'restart_at' => $yesterday->toDateString() . ' 23:59:59',
                        'total_at' => $diff1->format('%H:%I:%S'),
                    ]);
    
                    // 当日の休憩時間を取得
                    $diff2 = Carbon::parse($today->toDateString() . ' 00:00:00')->diff($restart);
    
                    Rest::create([    
                        'user_id' => Auth::id(),
                        'attendance_id' => Attendance::where('user_id', Auth::id())->orderBy('id', 'desc')->first()['id'],
                        'break_at' => $today->toDateString() . ' 00:00:00',
                        'restart_at' => $base_restart,
                        'total_at' => $diff2->format('%H:%I:%S'),
                    ]);

                    DB::commit();
                } catch(PDOException $e) {
                    DB::rollback();
                    // エラー内容の保存
                    Log::error('データベース接続失敗', [
                        'content' => $e->getMessage(),
                        'location' => $e->getFile(),
                        'row' => $e->getLine(),
                    ]);
                }
                
            } else {
                // 休憩時間を取得
                $diff = $break->diff($restart);
    
                // update処理
                $rest->update([
                    'restart_at' => $base_restart,
                    'total_at' => $diff->format('%H:%I:%S'),
                ]);
            }

            // セッションのボタン制御用の値を削除
            session()->forget('break');

            // セッションにコメントを格納
            session()->flash('success', '休憩を終了しました');
        }

        return back();
    }

    /**
     * view表示
     * 勤怠一覧ページ
     * @param void
     * @return view
     */
    public function indexAttendance(Request $request)
    {
        if ($request->month) {
            $baseDay = Carbon::parse($request->month);
            $subMonth = $baseDay->copy()->subMonth();
            $addMonth = $baseDay->copy()->addMonth();
            $days = CarbonPeriod::create($baseDay->startOfMonth()->toDateString(), $baseDay->endOfMonth()->toDateString())->toArray();
        } else {
            // 前月を取得
            $subMonth = Carbon::now()->copy()->subMonth();
    
            // 翌月を取得
            $addMonth = Carbon::now()->copy()->addMonth();
    
            // 該当月の全ての日を取得
            $baseDay = Carbon::now()->copy();
            $days = CarbonPeriod::create($baseDay->startOfMonth()->toDateString(),$baseDay->endOfMonth()->toDateString())->toArray();
        }

        return view('attendance.list', compact('subMonth', 'addMonth', 'baseDay', 'days'));
    }

    /**
     * view表示
     * 時間外一覧ページ
    * @param void
     * @return view
     */
    public function indexOverAttendance()
    {
        // 該当月の全ての日を取得
        $baseDay = Carbon::now()->copy();
        $days = CarbonPeriod::create($baseDay->startOfMonth()->toDateString(), $baseDay->endOfMonth()->toDateString())->toArray();

        return view('attendance.over', compact('baseDay', 'days'));
    }
}
