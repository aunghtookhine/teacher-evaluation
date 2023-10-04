<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\StudentSubject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = array(
            (object) [
                "name" => "Aung Htoo Khine",
                "email" => 'ahk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 1,
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Htet Nge Nge Ko',
                "email" => 'hnnk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 2,
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Nway Nway Aung',
                "email" => 'nna@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 3,
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Kyaw Zin Hein',
                "email" => 'kzh@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 4,
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Zaw Lwin Htoo',
                "email" => 'zlh@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 5,
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Hein Htet Arkar Mg',
                "email" => 'hham@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 6,
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Aung Pyae Phyo',
                "email" => 'app@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 7,
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Ye Yint Myat',
                "email" => 'yym@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 8,
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Zin Min Thu',
                "email" => 'zmt@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 9,
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Myat Thu Kha',
                "email" => 'mtk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 10,
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Aung Aung Myat Kyaw',
                "email" => 'aamk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => 11,
                "grade_id" => 5
            ]
        );

        foreach ($students as $student) {
            Student::factory()->create([
                'name' => $student->name,
                'email' => $student->email,
                'password' => Hash::make($student->password),
                'roll_number' => $student->roll_number,
                'grade_id' => $student->grade_id
            ]);

            User::factory()->create([
                "name" => $student->name,
                "email" => $student->email,
                "password" => Hash::make($student->password),
                "role" => "student"
            ]);
        };

        $ids = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];

        foreach ($ids as $id) {
            StudentSubject::factory()->create([
                "student_id" => $id,
                "subjects" => "1,2,3,4,5,6"
            ]);
        }
    }
}
