<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    private $user;
    private $course;
    private $classroom;

    public function __construct(User $user, Course $course, Classroom $classroom)
    {
        $this->user         = $user;
        $this->course       = $course;
        $this->classroom    = $classroom;
    }

    public function index()
    {
        $all_classes = $this->classroom
                            ->orderBy('date')
                            ->orderBy('start_time')
                            ->paginate(12);

        return view('admin.classrooms.index')->with('all_classes', $all_classes);
    }

    public function create()
    {
        $all_courses = $this->course->all();
        $all_teachers = $this->user->where('role_id', User::TEACHER_ROLE_ID)->get();
        return view('admin.classrooms.create')
                ->with('all_teachers', $all_teachers)
                ->with('all_courses', $all_courses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course'    => 'required',
            'date'      => 'required',
            'start_time'=> 'required',
            'teacher'   => 'required'
        ]);

        $this->classroom->course_id     = $request->course;
        $this->classroom->date          = $request->date;
        $this->classroom->start_time    = $request->start_time;
        $this->classroom->teacher_id   = $request->teacher;
        $this->classroom->save();

        return redirect()->route('admin.classroom');
    }

    public function history()
    {
        $finished_classes = $this->classroom
                                    ->onlyTrashed()
                                    ->latest('date')
                                    ->orderBy('teacher_id')
                                    ->get();
        return view('admin.classrooms.history')->with('finished_classes', $finished_classes);                            
    }

    public function destroy($id)
    {
        $this->classroom->onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back();
    }
}
