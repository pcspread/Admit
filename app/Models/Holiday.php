<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Carbon読込
use Carbon\Carbon;

class Holiday extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'genre_id', 'start_day', 'end_day', 'start_time', 'end_time', 'approval',
    ];

    /**
     * 休暇申請一覧の日付を作成する
     * @param $holiday
     * @return string
     */
    public function listDate($holiday)
    {
        if (!empty($holiday['end_day'])) {
            return Carbon::parse($holiday['start_day'])->format('m月d日') . '～' . Carbon::parse($holiday['end_day'])->format('m月d日');
        } else {
            return '';
        }
    }

    /**
     * 休暇申請一覧の時間を作成する
     * @param $holiday
     * @return string
     */
    public function listTime($holiday)
    {
        if (!empty($holiday['end_time'])) {
            return Carbon::parse($holiday['start_time'])->format('H:i') . '～' . Carbon::parse($holiday['end_time'])->format('H:i');
        } else {
            return '';
        }
    }

    /**
     * リレーション設定
     * @param void
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * リレーション設定
     * @param void
     * @return object
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
