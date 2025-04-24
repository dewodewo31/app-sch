<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'birth_date',
        'birth_place',
        'address',
        'religion',
        'phone',
        'photo',
        'user_id',
        'classroom_id'
    ];

    protected $casts = [
        'birth_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
