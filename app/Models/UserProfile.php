<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'profile_image', 'staff_id', 'email', 'phone',
        'emergency_phone', 'father_name', 'mother_name', 'gender',
        'date_of_birth', 'marital_status', 'blood_group',
        'national_id', 'passport_no',
    ];

    // Define the relationship with the User model (if applicable)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
