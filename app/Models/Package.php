<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'Packages';

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
