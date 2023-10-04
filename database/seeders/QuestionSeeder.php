<?php
namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            'Appear well-versed in this subject area',
            'Be enthusiastic in teaching subject in classroom',
            'Be well prepared',
            'Communicates clearly in class',
            'Be approachable to discuss',
            'Provides useful guidelines',
            'Provides useful guidelines',
            'Be effective teacher',
            'Connect with students',
            'Can answer questions'];

        foreach ($questions as $question) {
            Question::factory()->create([
                'name' => $question
            ]);
        }
    }
}
