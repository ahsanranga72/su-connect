<?php

namespace Modules\FrontendModule\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AdminModule\app\Models\Blog;
use Modules\AdminModule\app\Models\Notice;

class HomeController extends Controller
{
    private $notice;
    private $blog;

    public function __construct(Notice $notice, Blog $blog)
    {
        $this->notice = $notice;
        $this->blog = $blog;
    }
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $blogs = $this->blog->with('owner')->active()->latest()->paginate(5);
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
