<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProfile extends Model
{
    protected $fillable = ['user_id', 'company_name', 'contact_person', 'phone', 'tax_number', 'monthly_volume', 'preferred_packaging'];

    protected function casts(): array
    {
        return ['preferred_packaging' => 'array'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
