<?php

namespace App\Http\Controllers;

// Request読込
use Illuminate\Http\Request;
use App\Http\Requests\HolidayRequest;
// Model読込
use App\Models\Genre;
use App\Models\Holiday;
// Auth読込
use Illuminate\Support\Facades\Auth;

class HolidayController extends Controller
{
    /**
     * view表示：休暇申請
     * @param void
     * @return view
     */
    public function createHoliday()
    {
        // ジャンル情報の取得
        $genres = Genre::all();

        return view('holiday.create', compact('genres'));
    }

    /**
     * 休暇申請処理
     * @param object $request
     * @return back
     */
    public function storeHoliday(HolidayRequest $request)
    {
        // フォーム情報を取得
        $form = $request->only(['genre_id', 'date1', 'date2', 'time1', 'time2']);

        // create処理
        Holiday::create([
            'user_id' => Auth::id(),
            'genre_id' => $form['genre_id'],
            'start_day' => $form['date1'],
            'end_day' => $form['date2'],
            'start_time' => $form['time1'],
            'end_time' => $form['time2'],
        ]);

        return back()->with('success', '申請が完了しました');
    }

    /**
     * view表示：休暇申請リスト
     * @param void
     * @return view
     */
    public function indexHoliday()
    {
        // 休暇申請情報を取得
        $holidays = Holiday::orderBy('id', 'desc')->get();

        return view('holiday.list', compact('holidays'));
    }

    /**
     * 休暇申請承認処理
     * @param int $holiday_id
     * @return back
     */
    public function updateHoliday($holiday_id)
    {
        // update処理
        Holiday::find($holiday_id)->update([
            'approval' => 1,
        ]);

        return back()->with('success', '休暇を承認しました');
    }
}
