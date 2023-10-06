<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'grade_id', 'teacher_id', 'isArchived'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
