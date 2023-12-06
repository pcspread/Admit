<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * view表示
     * 勤怠リスト
     * @param void
     * @return view
     */
    public function indexAttendance()
    {
        return view('attendance.list');
    }

    /**
     * view表示
     * 時間外リスト
     * @param void
     * @return view
     */
    public function indexOverAttendance()
    {
        return view('attendance.over');
    }
}
