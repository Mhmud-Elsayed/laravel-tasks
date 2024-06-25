<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'category_id'
    ];
    public function orders(){
        return $this->belongsToMany(order::class);
    }
}
