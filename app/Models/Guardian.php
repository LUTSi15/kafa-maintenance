<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Add user id field
        'occupation', // Add occupation field
        'phoneNum', // Add phone field
        'icNum', // Add ic_number field
        'address', // Add address field
        'gender', // Add gender field
        'race', // Add race field
        'age', // Add age field
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'guardian_id');
    }
}
