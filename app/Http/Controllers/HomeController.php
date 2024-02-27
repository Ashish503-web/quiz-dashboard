<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::inRandomOrder()->with('correctOption', 'options')->take(5)->get();
        // dd(Auth::user()->is_admin);
        if (Auth::user()->is_admin === "1") {

            return view('admin.layouts.index', compact('questions'));
        } else {
            return view('home', compact('questions'));
        }
    }
}
