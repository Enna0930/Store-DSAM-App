<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotePricingTier extends Model
{
    protected $fillable = [
        'quote_request_id',
        'quote_request_item_id',
        'tier_number',
        'quantity',
        'discount_percent',
        'unit_price',
        'total_price',
    ];

    protected $casts = [
        'tier_number' => 'integer',
        'quantity' => 'integer',
        'discount_percent' => 'decimal:2',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function quoteRequest()
    {
        return $this->belongsTo(QuoteRequest::class);
    }

    public function item()
    {
        return $this->belongsTo(QuoteRequestItem::class, 'quote_request_item_id');
    }

}
