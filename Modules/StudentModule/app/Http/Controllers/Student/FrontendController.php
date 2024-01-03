<?php

namespace Modules\StudentModule\app\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\TeacherModule\app\Models\Teacher;

class FrontendController extends Controller
{
    private $teacher;
    private $user;

    public function __construct(Teacher $teacher, User $user)
    {
        $this->teacher = $teacher;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function teachers_list()
    {
        $teachers = $this->user->active()->type(TEACHER)->get();

        return view('studentmodule::frontend.teachers-list')
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('studentmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('studentmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('studentmodule::edit');
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
