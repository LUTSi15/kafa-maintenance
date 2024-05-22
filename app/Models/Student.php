<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function guardian()
    {

        return $this->belongsTo(Guardian::class);
    }

    public function classroom()
    {

        return $this->belongsTo(Classroom::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'results')
            ->withPivot('year', 'typeOfExamination', 'marks', 'grade', 'comment')
            ->withTimestamps();
    }
}
