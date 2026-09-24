<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequestItem extends Model
{
    protected $fillable = [
        'quote_request_id',
        'item_number',
        'product_category',
        'material_type',
        'target_quantity',
        'dimensions_size',
        'thickness_gauge',
        'print_type',
        'other_notes',
    ];

    public function quoteRequest()
    {
        return $this->belongsTo(QuoteRequest::class);
    }

    public function pricing()
    {
        return $this->hasOne(QuotePricing::class, 'quote_request_item_id');
    }

    public function pricingTiers()
    {
        return $this->hasMany(QuotePricingTier::class, 'quote_request_item_id')->orderBy('tier_number');
    }
}
