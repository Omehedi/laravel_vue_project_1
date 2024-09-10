<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    /**
     * Define a relationship with the Category model.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Validate the input data for creating or updating a subcategory.
     *
     * @param array $input
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator($input)
    {
        return Validator::make($input, [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id' // Ensure category_id exists in categories table
        ]);
    }
}
