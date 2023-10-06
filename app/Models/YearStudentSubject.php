<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearStudentSubject extends Model
{
    use HasFactory;
    protected $fillable = ['year_id', 'student_id', 'subject_id'];
}
