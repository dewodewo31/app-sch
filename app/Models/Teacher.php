<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'birth_place',
        'address',
        'phone',
        'photo',
        'certificate_number',
        'certification_date',
        'certification_institution',
        'user_id',
        'subject_id'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'certification_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
