<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'user_id', 'start_at', 'end_at', 'date_at', 'total_at',
    ];

    /**
     * リレーション設定
     * @param void
     * @return object
     */
    public function rests()
    {
        return $this->hasMany(Rest::class);
    }


    /**
     * 勤怠リストの勤務時間を作成する
     * @param $attendance
     * @return string
     */
    public function listDetailAttendance($attendance)
    {
        $text = '';

        if (!empty($attendance['end_at'])) {
            $text = Carbon::parse($attendance['start_at'])->format('H:i') . '  ～ ';
            $text .= Carbon::parse($attendance['end_at'])->format('H:i');
            return $text;            
        } else {
            return '';
        }
    }

    /**
     * 勤怠リストの総勤務時間を作成する
     * @param $attendance
     * @return string
     */
    public function listTotalAttendance($attendance)
    {
        if (!empty($attendance)) {
            return Carbon::parse($attendance['total_at'])->format('H:i');
        } else {
            return '';
        }
    }

    /**
     * 勤怠リストの休憩詳細を作成する
     * @param $attendance
     * @return string
     */
    public function listDetailRest($attendance)
    {
        $text = '';

        if (!empty($attendance->rests)) {
            foreach ($attendance->rests as $rest) {
                $text .= Carbon::parse($rest['break_at'])->format('H:i') . ' ～ ' . Carbon::parse($rest['restart_at'])->format('H:i') . '(' . Carbon::parse($rest['total_at'])->format('H:i') . ')' . '<br>';
            }
            return $text;
        } else {
            return '';
        }
    }

    /**
     * 時間外リストの勤務内容を作成する
     * @param $attendance
     * @return string
     */
    public function overAttendance($attendance)
    {
        $text = '';

        if (!empty($attendance)) {
            if ($attendance['end_at'] > $attendance['date_at'] . ' 18:00:00') {
                $text .= Carbon::parse($attendance['start_at'])->format('H:i');
                $text .= ' ～ ' . Carbon::parse($attendance['end_at'])->format('H:i');
                return $text;
            } else {
                return '';
            }
        } else {
            return '';
        }
    }
}
