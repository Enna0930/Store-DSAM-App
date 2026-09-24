<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'reference',
        'user_id',
        'client_name',
        'client_email',
        'client_phone',
        'client_address',
        'product_category',
        'material_type',
        'target_quantity',
        'dimensions_size',
        'thickness_gauge',
        'print_type',
        'other_notes',
        'sample_file_path',
        'status',
        'approved_at',
        'approved_by',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pricing()
    {
        return $this->hasOne(QuotePricing::class)->whereNull('quote_request_item_id');
    }

    public function pricings()
    {
        return $this->hasMany(QuotePricing::class);
    }

    public function pricingTiers()
    {
        return $this->hasMany(QuotePricingTier::class)->orderBy('tier_number');
    }

    public function items()
    {
        return $this->hasMany(QuoteRequestItem::class)->orderBy('item_number');
    }

    protected function casts(): array
    {
        return [
            'approved_at' => 'datetime',
        ];
    }
}
