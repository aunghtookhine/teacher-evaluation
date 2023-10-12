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
                "name" => 'Thike Htaw Aung',
                "email" => 'tha@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '1IT-1',
                "grade_id" => 1
            ],
            (object) [
                "name" => 'Kaung Khant Kyaw',
                "email" => 'kkk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '1IT-2',
                "grade_id" => 1
            ],
            (object) [
                "name" => 'Kaung Sett Min Thwin',
                "email" => 'ksmt@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '1IT-3',
                "grade_id" => 1
            ],
            (object) [
                "name" => 'Mya Wuttyi Sett',
                "email" => 'mws@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '2IT-1',
                "grade_id" => 2
            ],
            (object) [
                "name" => 'Moe Thandar Aye',
                "email" => 'mta@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '2IT-2',
                "grade_id" => 2
            ],
            (object) [
                "name" => 'Aye Pyae Pyae Moe',
                "email" => 'appm@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '2IT-3',
                "grade_id" => 2
            ],
            (object) [
                "name" => 'Ei Kay Khine',
                "email" => 'ekk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '3IT-1',
                "grade_id" => 3
            ],
            (object) [
                "name" => 'Han Nwe Htutt',
                "email" => 'hnh@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '3IT-2',
                "grade_id" => 3
            ],
            (object) [
                "name" => 'Ye Zarni Ko',
                "email" => 'yzk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '4IT-1',
                "grade_id" => 4
            ],
            (object) [
                "name" => 'Moe Zaw',
                "email" => 'mz@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '4IT-2',
                "grade_id" => 4
            ],
            (object) [
                "name" => 'Eaint Hmue Khin',
                "email" => 'ehk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '4IT-3',
                "grade_id" => 4
            ],
            (object) [
                "name" => "Aung Htoo Khine",
                "email" => 'ahk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-1',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Htet Nge Nge Ko',
                "email" => 'hnnk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-2',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Nway Nway Aung',
                "email" => 'nna@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-3',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Kyaw Zin Hein',
                "email" => 'kzh@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-4',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Zaw Lwin Htoo',
                "email" => 'zlh@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-5',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Hein Htet Arkar Mg',
                "email" => 'hham@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-6',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Aung Pyae Phyo',
                "email" => 'app@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-7',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Ye Yint Myat',
                "email" => 'yym@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-8',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Zin Min Thu',
                "email" => 'zmt@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-9',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Myat Thu Kha',
                "email" => 'mtk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-10',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Aung Aung Myat Kyaw',
                "email" => 'aamk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-11',
                "grade_id" => 5
            ],
            (object) [
                "name" => "Sai Pyae Sone Thu",
                "email" => 'spst@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-13',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Hein Htet Soe',
                "email" => 'hhs@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-14',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Phyu Sin Kyail',
                "email" => 'psk@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-15',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Thant Zin Phyo',
                "email" => 'tzp@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-16',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Myat Min Han',
                "email" => 'mmh@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-17',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Kyaw Phyo Win',
                "email" => 'kpw@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-18',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Min Thu Ra',
                "email" => 'mtr@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-19',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Thet Toe Wai',
                "email" => 'ttw@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-20',
                "grade_id" => 5
            ],
            (object) [
                "name" => 'Kyaw Lynn Lynn',
                "email" => 'kll@gmail.com',
                "password" => 'asdffdsa',
                "roll_number" => '5IT-24',
                "grade_id" => 5
            ],
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

        // $ids = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
        // $subjectIds = [1, 2, 3, 4, 5, 6];

        // foreach ($ids as $id) {
        //     foreach ($subjectIds as $subjectId) {
        //         StudentSubject::factory()->create([
        //             "student_id" => $id,
        //             "subject_id" => $subjectId,
        //         ]);
        //     }
        // }
    }
}
