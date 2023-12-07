<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * 日報一覧
     * @param void
     * @return view
     */
    public function indexReport()
    {
        return view('report.list');
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

