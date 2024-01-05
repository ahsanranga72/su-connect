<?php

namespace Modules\FrontendModule\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AdminModule\app\Models\Blog;
use Modules\AdminModule\app\Models\Notice;
use Modules\StudentModule\app\Models\FollowRequest;

class HomeController extends Controller
{
    private $notice;
    private $blog;
    private $follow_request;
    private $user;

    public function __construct(Notice $notice, Blog $blog, FollowRequest $follow_request, User $user)
    {
        $this->notice = $notice;
        $this->blog = $blog;
        $this->follow_request = $follow_request;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $admin_ids = $this->user->active()->whereIn('user_type', ADMIN)->pluck('id')->toArray();

        $blogs = $this->blog->with('owner')->active();
        
        if (auth()->check() && auth()->user()->user_type === STUDENT) {
            $follow_teachers_user_id = $this->follow_request
                                        ->where('student_user_id', auth()->user()->id)
                                        ->where('status', 'accepted')
                                        ->pluck('teacher_user_id')->toArray();
            $admin_teacher_ids = array_merge($admin_ids, $follow_teachers_user_id);

            $blogs = $blogs->whereIn('created_by', $admin_teacher_ids);
        } else {

            $blogs = $blogs->whereIn('created_by', $admin_ids);
        }
        $blogs = $blogs->latest()->paginate(5);
        $notices = $this->notice->active()->latest()->get();
        return view('frontendmodule::home', compact('notices', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function all_notices()
    {
        $notices = $this->notice->active()->latest()->paginate(5);
        return view('frontendmodule::all-notices', compact('notices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function blog_details($id)
    {
        $blog = $this->blog->with('owner')->find($id);
        return view('frontendmodule::blog-details', compact('blog'));
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('frontendmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('frontendmodule::edit');
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
