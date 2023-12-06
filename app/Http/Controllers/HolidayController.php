<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * view表示：休暇申請
     * @param void
     * @return view
     */
    public function createHoliday()
    {
        return view('holiday.create');
    }

    /**
     * view表示：休暇申請リスト
     * @param void
     * @return view
     */
    public function indexHoliday()
    {
        return view('holiday.list');
    }
}
