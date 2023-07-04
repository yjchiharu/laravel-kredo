<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StudentController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $all_students = $this->user
                            ->withTrashed()
                            ->where('role_id', User::STUDENT_ROLE_ID)
                            ->orderBy('name')
                            ->paginate(10);

            return view('admin.students.index')->with('all_students', $all_students);
    }

    public function create()
    {
        return view('admin.students.create');
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
        $this->user->role_id = User::STUDENT_ROLE_ID;
        $this->user->save();

        return redirect()->route('admin.student');
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
        $user = $this->user->findOrFail($id);
        $user->forceDelete();
        
        return redirect()->back();
    }


}



