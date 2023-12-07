<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'break_at', 'restart_at', 'total_at'
    ];
}
