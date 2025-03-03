<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    // Add the fields that can be mass-assigned
    protected $fillable = [
        'student_id',
        'course',
        'semester',
        'section',
    ];
}
