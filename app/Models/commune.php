<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commune extends Model
{
    use HasFactory;
    protected $table = 'communes';

    public function wilaya(){
        return $this->belongsTo(Wilaya::class);
    }
}
