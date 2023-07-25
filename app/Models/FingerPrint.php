<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FingerPrint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Add any additional relationships or methods you need for FingerPrint model
}