<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manage extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'manages';

    protected $fillable = [
        'student_id',
        'name',
        'leave_start_date',
        'leave_end_date',
        'days',
        'apply_date',
        'status'
    ];
}
