<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function getLessons(){
        $lessons = Lesson::orderBy('given_date','asc')->get();
        return view('lessons.lesson', ['lessons' => $lessons]);
    }
}
