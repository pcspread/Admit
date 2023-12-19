<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'date_at', 'content', 'check',
    ];

    /**
     * リレーション設定
     * @param void
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
