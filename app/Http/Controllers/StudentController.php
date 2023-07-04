<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    private $user;
    private $course;
    private $classroom;

    public function __construct(User $user, Classroom $classroom, Course $course)
    {
        $this->user = $user;
        $this->classroom = $classroom;
        $this->course = $course;
    }

    public function index()
    {
        $my_classes = $this->user
                            ->findOrFail(Auth::user()->id)
                            ->studentClasses()
                            ->orderBy('date')
                            ->orderBy('start_time')
                            ->get();

        $available_classes = $this->classroom
                            ->whereNull('student_id')
                            ->orderBy('date')
                            ->orderBy('start_time')
                            ->get();

        return view('students.index')->with('my_classes', $my_classes)
                                        ->with('available_classes', $available_classes);
    }

    public function saveBooking($class_id)
    {
        $class              = $this->classroom->findOrFail($class_id);
        $class->student_id  = Auth::user()->id;
        $class->save();

        return redirect()->back();
    }

    public function cancelBooking($class_id)
    {
        $class = $this->classroom->findOrFail($class_id);
        $class->student_id = null;
        $class->save();

        return redirect()->back();
    }

    public function history()
    {
        $finished_classes = $this->user
                                ->findOrFail(Auth::user()->id)
                                ->studentClasses()
                                ->onlyTrashed()
                                ->latest('date')
                                ->oldest('start_time')
                                ->paginate(20);

        return view('students.history')->with('finished_classes', $finished_classes);                        
    }
}



