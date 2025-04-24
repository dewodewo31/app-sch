<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Major
        $major = \App\Models\Major::create([
            'name' => 'Umum'
        ]);

        // Buat Subject
        $subject = \App\Models\Subject::create([
            'name' => 'Matematika Dasar'
        ]);

        // Buat User Teacher
        $teacherUser = \App\Models\User::create([
            'name' => 'Guru Default',
            'email' => 'guru@sekolah.id',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);

        // Buat Teacher
        $teacher = \App\Models\Teacher::create([
            'user_id' => $teacherUser->id,
            'subject_id' => $subject->id,
            'name' => $teacherUser->name,
            'birth_date' => '2000-01-01',
            'birth_place' => 'Kota Default',
            'address' => 'Alamat Default',
            'certificate_number' => '123456'
        ]);

        // Buat Classroom
        \App\Models\Classroom::create([
            'name' => 'Kelas X',
            'grade_level' => '10',
            'academic_year' => '2024/2025',
            'major_id' => $major->id,
            'teacher_id' => $teacher->id
        ]);
    }
}
