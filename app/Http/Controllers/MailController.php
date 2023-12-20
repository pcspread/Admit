<?php

namespace App\Http\Controllers;

// Request読込
use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
// Model読込
use App\Models\Notice;
// Auth読込
use Illuminate\Support\Facades\Auth;
// Mail関係読込
use Illuminate\Support\Facades\Mail;
use App\Mail\NoticeMail;

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

    /**
     * メール通知処理
     * @param object $request
     * @return back
     */
    public function storeMail(MailRequest $request)
    {
        // フォーム情報を取得
        $form = $request->only(['email', 'title', 'content']);

        // create処理
        Notice::create([
            'user_id' => Auth::id(),
            'email' => $form['email'],
            'title' => $form['title'],
            'content' => $form['content'],
        ]);
        
        // メール送信処理
        Mail::send(new NoticeMail($form['email'], $form['title'], $form['content']));

        // メールの二重送信防止処理
        $request->session()->regenerateToken();
        
        return back()->with('success', 'メール通知が完了しました');
    }
}
