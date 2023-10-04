<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = array(
            (object) [
                "code" => "IT-52037",
                "name" => "Digital Image Processing",
                "grade_id" => 5,
                "teacher_id" => 1
            ],
            (object) [
                "code" => "IT-52065",
                "name" => "Software Engineering",
                "grade_id" => 5,
                "teacher_id" => 2
            ],
            (object) [
                "code" => "IT-52047",
                "name" => "Artificial Intelligence",
                "grade_id" => 5,
                "teacher_id" => 3
            ],
            (object) [
                "code" => "IT-52043",
                "name" => "Embedded Systems",
                "grade_id" => 5,
                "teacher_id" => 4
            ],
            (object) [
                "code" => "IT-52042",
                "name" => "Cryptography and Network Security",
                "grade_id" => 5,
                "teacher_id" => 5
            ],
            (object) [
                "code" => "IT-51058",
                "name" => "Integrated Design Project",
                "grade_id" => 5,
                "teacher_id" => 6
            ]
        );

        foreach ($subjects as $subject) {
            Subject::factory()->create([
                "code" => $subject->code,
                "name" => $subject->name,
                "grade_id" => $subject->grade_id,
                "teacher_id" => $subject->teacher_id
            ]);
        };
    }
}
