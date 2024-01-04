<?php

namespace Modules\TeacherModule\app\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\StudentModule\app\Models\FollowRequest;

class FollowRequestController extends Controller
{
    private $follow_request;

    public function __construct(FollowRequest $follow_request)
    {
        $this->follow_request = $follow_request;
    }
    /**
     * Display a listing of the resource.
     */
    public function get()
    {
        $follow_requests = $this->follow_request->with('student')
                            ->where('teacher_user_id', auth()->user()->id)
                            ->latest()->paginate(10);

        return view('teachermodule::follow-request', compact('follow_requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachermodule::create');
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
