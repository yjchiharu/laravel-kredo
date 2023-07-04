<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TeacherController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $all_teachers = $this->user
                            ->withTrashed()
                            ->where('role_id', User::TEACHER_ROLE_ID)
                            ->orderBy('name')
                            ->paginate(10);
        return view('admin.teachers.index')->with('all_teachers', $all_teachers);
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = Hash::make($request->password);
        $this->user->role_id = User::TEACHER_ROLE_ID;
        $this->user->save();

        return redirect()->route('admin.teacher');
    }

    public function deactivate($id)
    {
        $this->user->destroy($id);
        return redirect()->back();
    }

    public function activate($id)
    {
        $this->user->onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();

    }

    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->forceDelete();
        
        return redirect()->route('admin.teacher');
    }
}