<?php

namespace App\Http\Controllers;

// Request読込
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
// Model読込
use App\Models\Report;
// Auth読込
use Illuminate\Support\Facades\Auth;
// Carbon読込
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * 日報報告ページ
     * @param void
     * @return view
     */
    public function createReport()
    {
        return view('report.create');
    }

    /**
     * 日報報告処理
     * @param object $request
     * @return back
     */
    public function storeReport(ReportRequest $request)
    {
        // フォーム情報を取得
        $form = $request->only(['date', 'content']);

        // create処理
        Report::create([
            'user_id' => Auth::id(),
            'date_at' => $form['date'],
            'content' => $form['content'],
        ]);      
        
        return back()->with('success', '日報を作成しました');
    }

    /**
     * 日報一覧
     * @param object $request
     * @return view
     */
    public function indexReport(Request $request)
    {
        // クエリパラメータがある場合
        if ($request->date) {
            // 基準日を設定
            $base = Carbon::parse($request->date);

            // 基準日の前日を取得
            $subDay = $base->copy()->subDay();

            // 基準日の翌日を取得
            $addDay = $base->copy()->addDay();

        } else {
            // 今日の日付を取得
            $base = Carbon::now();
    
            // 前日の日付を取得
            $subDay = $base->copy()->subDay();
    
            // 翌日の日付を取得
            $addDay = $base->copy()->addDay();
    
        }
        // 日報データを取得
        $reports = Report::where('date_at', $base->toDateString())->get();

        return view('report.list', compact('base', 'subDay', 'addDay', 'reports'));
    }

    /**
     * 日報詳細
     * @param void
     * @return view
     */
    public function showReport()
    {
        return view('report.detail');
    }
}

