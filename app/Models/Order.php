<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model // Ensure the class name is capitalized
{
    use HasFactory;

    // Specify which fields can be mass assigned
    protected $fillable = ['customer_name', 'total', 'status'];
}

