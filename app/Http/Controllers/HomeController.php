<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $role_id =  Auth::user()->role_id;

        if($role_id === User::ADMIN_ROLE_ID){
            return redirect()->route('admin.classroom');
        }elseif ($role_id === User::STUDENT_ROLE_ID){
            return redirect()->route('student.index');
        }elseif($role_id === User::TEACHER_ROLE_ID){
            return redirect()->route('teacher.index'); 
        }
    }

}
