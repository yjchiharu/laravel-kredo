<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{
    private $user;
    private $classroom;

    public function __construct(User $user, Classroom $classroom)
    {
        $this->user         = $user;
        $this->classroom    = $classroom;
    }

    public function index()
    {
        $user = $this->user->findOrFail(Auth::user()->id);

        $booked_classes = $user
                            ->teacherClasses()
                            ->whereNotNull('student_id')
                            ->orderBy('date')
                            ->orderBy('start_time')
                            ->get();
        
        $my_classes = $user
                        ->teacherClasses()
                        ->whereNull('student_id')
                        ->orderBy('date')
                        ->orderBy('start_time')
                        ->get();

        return view('teachers.index')
                ->with('my_classes', $my_classes)
                ->with('booked_classes', $booked_classes);
    }

    public function destroy($class_id)
    {
        $this->classroom->destroy($class_id);
        return redirect()->back();
    }

    public function history()
    {
        $finished_classes = $this->user
                                ->findOrFail(Auth::user()->id)
                                ->teacherClasses()
                                ->onlyTrashed()
                                ->latest('date')
                                ->orderBy('start_time')
                                ->paginate(20);
        return view('teachers.history')->with('finished_classes', $finished_classes);                        
    }

    public function revert($class_id)
    {
        $this->classroom->onlyTrashed()->findOrFail($class_id)->restore();
        return redirect()->route('teacher.index');
    }

}