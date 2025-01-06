<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'guardian_id', 
        'icNum', 
        'studentName', 
        'gender', 
        'race', 
        'age',
        'birthDate',
    ];

    public function guardian()
    {

        return $this->belongsTo(Guardian::class);
    }
}
