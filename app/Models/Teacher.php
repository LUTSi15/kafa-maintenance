<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id', // Add classroom id field
        'user_id', // Add user id field
        'kafaName', // Add Name of Kafa field
        'phoneNum', // Add phone field
        'icNum', // Add ic_number field
        'address', // Add address field
        'gender', // Add gender field
        'race', // Add race field
        'age', // Add age field
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }
}
