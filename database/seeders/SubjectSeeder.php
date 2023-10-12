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
                "code" => "IT-12013",
                "name" => "Introduction to Computer Systems",
                "grade_id" => 1,
                "teacher_id" => 3
            ],
            (object) [
                "code" => "IT-21011",
                "name" => "Basic Electricity & Electronics",
                "grade_id" => 2,
                "teacher_id" => 6
            ],
            (object) [
                "code" => "IT-21012",
                "name" => "Data Communication",
                "grade_id" => 2,
                "teacher_id" => 1
            ],
            (object) [
                "code" => "IT-21015",
                "name" => "Programming Language in C++",
                "grade_id" => 2,
                "teacher_id" => 2
            ],
            (object) [
                "code" => "IT-21021",
                "name" => "Digital Logic Design",
                "grade_id" => 2,
                "teacher_id" => 4
            ],
            (object) [
                "code" => "IT-21025",
                "name" => "Web Development Technologies I",
                "grade_id" => 2,
                "teacher_id" => 5
            ],
            (object) [
                "code" => "IT-30001",
                "name" => "3rd Year 1",
                "grade_id" => 3,
                "teacher_id" => 2
            ],
            (object) [
                "code" => "IT-30002",
                "name" => "3rd Year 2",
                "grade_id" => 3,
                "teacher_id" => 3
            ],
            (object) [
                "code" => "IT-30003",
                "name" => "3rd Year 3",
                "grade_id" => 3,
                "teacher_id" => 4
            ],
            (object) [
                "code" => "IT-30004",
                "name" => "3rd Year 4",
                "grade_id" => 3,
                "teacher_id" => 1
            ],
            (object) [
                "code" => "IT-30005",
                "name" => "3rd Year 5",
                "grade_id" => 3,
                "teacher_id" => 2
            ],
            (object) [
                "code" => "IT-42017",
                "name" => "Modern Control Systems",
                "grade_id" => 4,
                "teacher_id" => 5
            ],
            (object) [
                "code" => "IT-42023",
                "name" => "Computer Architecture and Organization",
                "grade_id" => 4,
                "teacher_id" => 3
            ],
            (object) [
                "code" => "IT-42026",
                "name" => "Advanced Data Management Techniques",
                "grade_id" => 4,
                "teacher_id" => 2
            ],
            (object) [
                "code" => "IT-42032",
                "name" => "Advanced Computer Networks",
                "grade_id" => 4,
                "teacher_id" => 4
            ],
            (object) [
                "code" => "IT-42033",
                "name" => "Operating Systems",
                "grade_id" => 4,
                "teacher_id" => 1
            ],
            (object) [
                "code" => "IT-52037",
                "name" => "Digital Image Processing",
                "grade_id" => 5,
                "teacher_id" => 3
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
                "teacher_id" => 4
            ],
            (object) [
                "code" => "IT-52043",
                "name" => "Embedded Systems",
                "grade_id" => 5,
                "teacher_id" => 6
            ],
            (object) [
                "code" => "IT-52042",
                "name" => "Cryptography and Network Security",
                "grade_id" => 5,
                "teacher_id" => 8
            ],
            (object) [
                "code" => "IT-51058",
                "name" => "Integrated Design Project",
                "grade_id" => 5,
                "teacher_id" => 1
            ],
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
