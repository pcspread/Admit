<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:191'],
            'title' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string'],
        ];
    }

    /**
     * バリデーションメッセージの修正
     * @param void 
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスは文字列で入力してください',
            'email.email' => 'メールアドレスを正しい形式で入力してください',
            'email.max' => 'メールアドレスは191文字以内で入力してください',
            'title.required' => 'タイトルを入力してください',
            'title.string' => 'タイトルは文字列で入力してください',
            'title.max' => 'タイトルは50文字以内で入力してください',
            'content.required' => '内容を入力してください',
            'content.string' => '内容は文字列で入力してください',
        ];
    }
}
