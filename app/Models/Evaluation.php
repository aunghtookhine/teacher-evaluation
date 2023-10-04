<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = ["year_id", "subject_id"];

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
