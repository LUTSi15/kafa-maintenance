<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'results')
            ->withPivot('year', 'typeOfExamination', 'marks', 'grade', 'comment')
            ->withTimestamps();
    }
}
