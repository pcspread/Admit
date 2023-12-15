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
     * 勤怠リストの開始時間を作成する
     * @param $attendance
     * @return string
     */
    public function listStartAttendance($attendance)
    {
        if (!empty($attendance['start_at'])) {
            return Carbon::parse($attendance['start_at'])->format('H:i');
        } else {
            return '';
        }
    }

    /**
     * 勤怠リストの終了時間を作成する
     * @param $attendance
     * @return string
     */
    public function listEndAttendance($attendance)
    {
        if (!empty($attendance['end_at'])) {
            return Carbon::parse($attendance['end_at'])->format('H:i');
        } else {
            return '';
        }
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
        if (!empty($attendance['end_at'])) {
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
                if (!empty($rest['restart_at'])) {
                    $text .= Carbon::parse($rest['break_at'])->format('H:i') . ' ～ ' . Carbon::parse($rest['restart_at'])->format('H:i') . '(' . Carbon::parse($rest['total_at'])->format('H:i') . ')' . '<br>';
                } else {
                    $text = '';
                }
            }
            return $text;
        } else {
            return '';
        }
    }

    /**
     * 時間外リストの勤務時間を作成する
     * @param $attendance
     * @return string
     */
    public function overAttendance($attendance)
    {
        $text = '';

        if (!empty($attendance['end_at'])) {
            $text .= Carbon::parse($attendance['start_at'])->format('H:i');
            $text .= ' ～ ' . Carbon::parse($attendance['end_at'])->format('H:i');
            return $text;
        } else {
            return '';
        }
    }

    /**
     * 時間外リストの時間外部分を作成する
     * @param $attendance
     * @return string
     */
    public function overDiffAttendance($attendance)
    {
        if (!empty($attendance['end_at'])) {
            $base_diff = Carbon::parse($attendance['date_at'] . '18:00:00')->diff(Carbon::parse($attendance['end_at']));
            $diff = $base_diff->format('%H:%I');
            if ($diff > '00:00:00') {
                return $diff;
            } else {
                return '';
            }
        } else {
            return '';
        }
    }

}
