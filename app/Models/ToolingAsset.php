<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolingAsset extends Model
{
    protected $fillable = ['user_id', 'asset_type', 'asset_code', 'description', 'status', 'next_service_at'];

    protected function casts(): array
    {
        return ['next_service_at' => 'date'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
