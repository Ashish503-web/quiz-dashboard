<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //


    public function addQuestions()
    {
        return view('admin.questions.add');
    }

    public function storeQuestions(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'question' => 'required|string',
                'options' => 'required|array',
                'options.*' => 'required|string',
                'correct_option' => 'required|numeric|min:1|max:' . count($request->options)
            ]);

            
            $question = Question::create([
                'question' => $validatedData['question'],
            ]);

           
            foreach ($validatedData['options'] as $key => $optionText) {
                
                $existingOption = Option::where('question_id', $question->id)
                    ->where('option', $optionText)
                    ->first();

                if ($existingOption) {
                   
                    return redirect()->back()->with('error', 'Duplicate option detected.');
                }

          
                $option = Option::create([
                    'question_id' => $question->id,
                    'option' => $optionText,
                ]);

                
                if (($key + 1) === (int) $validatedData['correct_option']) {
                    $question->correctOption()->create([
                        'option_id' => $option->id,
                    ]);
                }
            }


            return redirect()->back()->with('success', 'Question created successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
