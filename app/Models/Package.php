<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'Packages';

    protected $fillable = [
        'uuid',
        'tracking_code',
        'commune_id',
        'delivery_type_id',
        'status_id',
        'store_id',
        'address',
        'can_be_opened',
        'name',
        'client_first_name',
        'client_last_name',
        'client_phone',
        'client_phone2',
        'cod_to_pay',
        'commission',
        'status_updated_at',
        'delivered_at',
        'delivery_price',
        'extra_weight_price',
        'free_delivery',
        'packaging_price',
        'partner_cod_price',
        'partner_delivery_price',
        'patner_return',
        'price',
        'price_to_pay',
        'return_price',
        'total_price',
        'weight',
    ];

    public function commune(){
        return $this->belongsTo(commune::class);
    }
    public function delivery_type(){
        return $this->belongsTo(delivery_type::class);
    }
    public function status(){
        return $this->belongsTo(Packages_statuse::class);
    }
    public function store(){
        return $this->belongsTo(Store::class);
    }
}
