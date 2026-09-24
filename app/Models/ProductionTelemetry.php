<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionTelemetry extends Model
{
    protected $table = 'production_telemetry';
    protected $fillable = ['client_order_id', 'line_name', 'stage', 'progress', 'status', 'variance_percent', 'reported_at'];

    protected function casts(): array
    {
        return ['reported_at' => 'datetime', 'variance_percent' => 'decimal:2'];
    }

    public function order()
    {
        return $this->belongsTo(ClientOrder::class, 'client_order_id');
    }
}
