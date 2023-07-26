<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FingerScan extends Model
{
    use HasFactory;
    protected $table = 'fingerscans';
    protected $fillable = [
        'isCorrect',
        'date',
        'tmpContent',
        'user_id',
        'scanmachine_id',
    ];

    // Add any additional relationships or methods you need for FingerScan model
}
