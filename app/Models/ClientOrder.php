<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientOrder extends Model
{
    protected $fillable = ['user_id', 'reference', 'product_name', 'quantity', 'status', 'requested_delivery_at', 'notes'];

    protected function casts(): array
    {
        return ['requested_delivery_at' => 'date'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function telemetry()
    {
        return $this->hasMany(ProductionTelemetry::class);
    }
}
