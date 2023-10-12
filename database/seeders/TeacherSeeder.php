<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = array(
            (object) [
                "name" => 'Daw Thu Thu Mon Oo',
                "email" => 'ttmo@gmail.com',
                "password" => 'asdffdsa',
                "position" => "dean"
            ],
            (object) [
                "name" => "Daw Than Win",
                "email" => 'tw@gmail.com',
                "password" => 'asdffdsa',
                "position" => "lecturer"
            ],
            (object) [
                "name" => "Daw Nwe Yee",
                "email" => 'ny@gmail.com',
                "password" => 'asdffdsa',
                "position" => "lecturer"
            ],
            (object) [
                "name" => 'Daw Ei Thet Mon',
                "email" => 'etm@gmail.com',
                "password" => 'asdffdsa',
                "position" => "lecturer"
            ],
            (object) [
                "name" => "Daw Ei Myat Mon",
                "email" => 'emm@gmail.com',
                "password" => 'asdffdsa',
                "position" => "lecturer"
            ],
            (object) [
                "name" => 'Daw Nyein Nyein Thu',
                "email" => 'nnt@gmail.com',
                "password" => 'asdffdsa',
                "position" => "lecturer"
            ],
            (object) [
                "name" => 'Daw Khin Moh Moh Win',
                "email" => 'kmmw@gmail.com',
                "password" => 'asdffdsa',
                "position" => "lecturer"
            ],
            (object) [
                "name" => 'Daw Phyo Ngwe Hlaing',
                "email" => 'pnh@gmail.com',
                "password" => 'asdffdsa',
                "position" => "lecturer"
            ],
            (object) [
                "name" => 'Daw Hein Thet Aung',
                "email" => 'hta@gmail.com',
                "password" => 'asdffdsa',
                "position" => "lecturer"
            ],
        );

        // Daw Thu Thu Mon Oo
        // Daw Than Win
        // Daw Nwe Yee
        // Daw Ei Thet Mon
        // Daw Ei Myat Mon
        // Daw Nyein Nyein Thu
        // Daw Khin Moh Moh Win
        // Daw Phyo Ngwe Hlaing
        // U Hein Thet Aung

        foreach ($teachers as $teacher) {
            Teacher::factory()->create([
                'name' => $teacher->name,
                'email' => $teacher->email,
                'password' => Hash::make($teacher->password),
                'position' => $teacher->position
            ]);

            User::factory()->create([
                "name" => $teacher->name,
                "email" => $teacher->email,
                "password" => Hash::make($teacher->password),
                "role" => $teacher->position === 'dean' ? 'admin' : 'teacher'
            ]);
        };
    }
}
