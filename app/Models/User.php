<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected static function boot()
    {
        parent::boot();

        // Sự kiện "creating" được kích hoạt khi tạo mới một bản ghi
        static::creating(function ($user) {
            // Lấy maNV cuối cùng trong cơ sở dữ liệu
            $lastMaNV = static::max('maNV');

            // Nếu không có maNV nào trong cơ sở dữ liệu, bắt đầu từ 000
            // Ngược lại, lấy 3 số cuối cùng của maNV cuối cùng và cộng thêm 1
            $nextNumber = $lastMaNV ? intval(substr($lastMaNV, -3)) + 1 : 0;

            // Tạo giá trị mới cho maNV với tiền tố 'B19DCCN' và dạng số 3 chữ số
            $user->maNV = 'B19DCCN' . sprintf('%03d', $nextNumber);
        });
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
