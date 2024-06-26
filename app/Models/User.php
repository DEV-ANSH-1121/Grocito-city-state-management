<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'otp',
        'role',
        'password',
        'pin_code_id ',
    ];

    /**
     * The attributes that are sortable.
     *
     * @var array
     */
    public $sortable = [
        'name',
        'email',
        'phone_no',
        'role',
        'pin_code_id ',
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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeFilter(Builder $query, $filter)
    {
        if (!empty($filter)) {
            $query->where('name', 'LIKE', "%{$filter}%")
                ->orWhere('email', 'LIKE', "%{$filter}%")
                ->orWhere('phone_no', 'LIKE', "%{$filter}%");
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pinCode()
    {
        return $this->belongsTo(PinCode::class);
    }
}
