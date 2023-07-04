<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    private $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function index()
    {

        $all_courses = $this->course
                            ->orderBy('title')
                            ->paginate(10);
        return view('admin.courses.index')->with('all_courses', $all_courses);
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $this->course->title = $request->title;
        $this->course->save();

        return redirect()->route('admin.course');
    }

    public function destroy($id)
    {
       // $this->course->where('courses_id', $course_id)->delete();
        $course = $this->course->findOrFail($id);
        $this->course->destroy($id);
        
        return redirect()->back();

    }
}




