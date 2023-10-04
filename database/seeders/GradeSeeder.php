<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = ['1-IT', '2-IT', '3-IT', '4-IT', '5-IT'];

        foreach ($grades as $grade) {
            Grade::factory()->create([
                'name' => $grade
            ]);
        }

    }
}
