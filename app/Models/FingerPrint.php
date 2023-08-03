<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FingerPrint extends Model
{
    use HasFactory;
    protected $table = 'fingerprints';
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
}