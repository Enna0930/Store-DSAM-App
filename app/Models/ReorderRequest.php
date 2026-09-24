<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReorderRequest extends Model
{
    protected $fillable = ['user_id', 'client_order_id', 'product_name', 'quantity', 'status', 'notes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(ClientOrder::class, 'client_order_id');
    }
}
