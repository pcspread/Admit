<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * view表示：メール通知ページ
     * @param void
     * @return view
     */
    public function createMail()
    {
        return view('mail.create');
    }
}
