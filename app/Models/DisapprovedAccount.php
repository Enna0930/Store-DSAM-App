<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisapprovedAccount extends Model
{
    protected $fillable = [
        'original_user_id',
        'name',
        'username',
        'email',
        'account_type',
        'department',
        'role_level',
        'reason',
        'disapproved_by',
        'disapproved_at',
    ];

    protected function casts(): array
    {
        return [
            'disapproved_at' => 'datetime',
        ];
    }
}
