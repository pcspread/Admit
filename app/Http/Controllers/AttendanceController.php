<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model読込
use App\Models\Attendance;
// Carbon読込
use Carbon\Carbon;
// Auth読込
use Illuminate\Support\Facades\Auth;

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
     * 勤務開始処理
     * @param object $request
     * @return back
     */
    public function storeAttendance(Request $request)
    {
        // 勤務開始が押された場合
        if ($request->attendance === 'start') {
            Attendance::create([
                'user_id' => Auth::id(),
                'start_at' => Carbon::now()->__toString(),
                'date_at' => Carbon::now()->toDateString(),
            ]);
        }

        // 勤務終了が押された場合
        if ($request->attendance === 'end') {
            // 時間情報の取得
            $attendance = Attendance::where('user_id', Auth::id())->orderBy('id', 'desc')->first();

            // Carbonインスタンスに変更(勤務開始)
            $start = Carbon::parse($attendance['start_at']);

            // Carbonインスタンスに変更(勤務終了)
            $end = Carbon::parse($attendance['end_at']);

            // 勤務開始から勤務終了までの時間を取得
            $diff = $start->diff($end);
            
            // update処理
            $attendance->update([
                'end_at' => Carbon::now()->__toString(),
                'total_at' => $diff->format('%H:%I:%S'),
            ]);
        }
        
        return back();
    }

    /**
     * view表示
     * 勤怠一覧ページ
     * @param void
     * @return view
     */
    public function indexAttendance()
    {
        return view('attendance.list');
    }

    /**
     * view表示
     * 時間外一覧ページ
    * @param void
     * @return view
     */
    public function indexOverAttendance()
    {
        return view('attendance.over');
    }
}
