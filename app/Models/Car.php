<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable =[
        'marque', 
        'model', 
        'year',
        'quantity', 
        'price',
        'status',
        'picture'
    ];
}
