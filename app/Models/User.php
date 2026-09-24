<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'username', 'email', 'password', 'is_approved', 'approved_at', 'account_type', 'department', 'role_level'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function clientProfile()
    {
        return $this->hasOne(ClientProfile::class);
    }

    public function adminProfile()
    {
        return $this->hasOne(AdminProfile::class);
    }

    public function orders()
    {
        return $this->hasMany(ClientOrder::class);
    }

    public function toolingAssets()
    {
        return $this->hasMany(ToolingAsset::class);
    }

    public function reorderRequests()
    {
        return $this->hasMany(ReorderRequest::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'approved_at' => 'datetime',
            'is_approved' => 'boolean',
            'account_type' => 'string',
            'department' => 'string',
            'role_level' => 'string',
            'password' => 'hashed',
        ];
    }
}
