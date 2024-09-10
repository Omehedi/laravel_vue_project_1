<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function validator($input){
        return Validator::make($input,[
            'name' => 'required|string|max:255',
        ]);
    }
}
