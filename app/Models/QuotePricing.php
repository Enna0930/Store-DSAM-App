<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotePricing extends Model
{
    protected $fillable = [
        'quote_request_id',
        'quote_request_item_id',
        'reference',
        'quantity',
        'material_cost',
        'printing_cost',
        'tooling_cost',
        'labor_cost',
        'delivery_cost',
        'overhead_cost',
        'electricity_cost',
        'waste_cost',
        'markup_percent',
        'subtotal',
        'markup_amount',
        'total_estimate',
        'currency',
        'notes',
        'calculated_by',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'material_cost' => 'decimal:2',
        'printing_cost' => 'decimal:2',
        'tooling_cost' => 'decimal:2',
        'labor_cost' => 'decimal:2',
        'delivery_cost' => 'decimal:2',
        'overhead_cost' => 'decimal:2',
        'electricity_cost' => 'decimal:2',
        'waste_cost' => 'decimal:2',
        'markup_percent' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'markup_amount' => 'decimal:2',
        'total_estimate' => 'decimal:2',
    ];

    public function quoteRequest()
    {
        return $this->belongsTo(QuoteRequest::class);
    }

    public function item()
    {
        return $this->belongsTo(QuoteRequestItem::class, 'quote_request_item_id');
    }

    public function pricingTiers()
    {
        return $this->hasMany(QuotePricingTier::class)->orderBy('tier_number');
    }
}
