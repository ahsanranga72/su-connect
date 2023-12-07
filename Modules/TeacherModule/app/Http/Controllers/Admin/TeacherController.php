<?php

namespace Modules\TeacherModule\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\TeacherModule\app\Models\Teacher;

class TeacherController extends Controller
{
    private $user;
    private $teacher;

    public function __construct(User $user, Teacher $teacher)
    {
        $this->user = $user;
        $this->teacher = $teacher;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teachers = $this->user->with('teacher')->where('user_type', 'teacher-admin')->when($request->has('search'), function ($query) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $query->orWhere('first_name', 'like', "%{$value}%");
                $query->orWhere('last_name', 'like', "%{$value}%");
                $query->orWhere('email', 'like', "%{$value}%");
                $query->orWhere('phone', 'like', "%{$value}%");
            }
        })->latest()->paginate(10);

        return view('teachermodule::admin.teacher.list', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachermodule::admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_image' => 'required|image',
            'teacher_id' => 'required|string|max:50',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required|string|max:50',
            'department' => 'required|string|max:50',
        ]);

        $user = $this->user;
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->user_type = 'teacher-admin';
        $user->profile_image = image_uploader('users/profile_images/', 'png', $request['profile_image'], null);
        $user->is_active = 1;
        $user->is_verified = 1;
        $user->save();

        $teacher = $this->teacher;
        $teacher->user_id = $user->id;
        $teacher->teacher_id = $request['teacher_id'];
        $teacher->department = $request['department'];
        $teacher->save();


        return back()->with('success',DEFAULT_200_STORE['message']);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('teachermodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('teachermodule::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
