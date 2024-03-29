<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'roll_number', 'grade_id', 'isArchived'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
