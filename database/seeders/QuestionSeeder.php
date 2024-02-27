<?php

namespace Database\Seeders;

use App\Models\Option;
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
    
        Question::factory()->count(20)->create()->each(function ($question) {
         
            $options = Option::factory()->count(4)->create(['question_id' => $question->id]);
  
            $correctOption = $options->random();
            $question->correctOption()->create(['option_id' => $correctOption->id]);
        });
    }
}
