<?php

namespace Modules\AdminModule\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AdminModule\app\Models\Blog;

class BlogController extends Controller
{
    private $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blogs = $this->blog->with('owner')->when($request->has('search'), function ($query) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $query->Where('title', 'like', "%{$value}%");
            }
        })->latest()->paginate(10);

        return view('adminmodule::blog.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminmodule::blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:10000',
            'title' => 'required|string',
            'description' => 'required',
        ]);

        $blog = $this->blog;
        $blog->image = image_uploader('blog/images/', 'png', $request['image'], null, 900, 560);
        $blog->title = $request['title'];
        $blog->description = $request['description'];
        $blog->created_by = auth()->user()->id;
        $blog->is_active = 1;
        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', DEFAULT_200_STORE['message']);
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
        $blog = $this->blog->findOrFail($id);
        return view('adminmodule::blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
            'title' => 'required|string',
            'description' => 'required',
        ]);

        $blog = $this->blog->find($id);
        if ($blog['created_by'] == auth()->user()->id) {
            if ($request->has('image')) {
                $blog->image = image_uploader('blog/images/', 'png', $request['image'], $blog['image'], 900, 560);
            }
            $blog->title = $request['title'];
            $blog->description = $request['description'];
            $blog->save();
        } else {
            return redirect()->route('admin.blogs.index')->with('error', 'Access denied !');
        }

        return redirect()->route('admin.blogs.index')->with('success', DEFAULT_200_UPDATE['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = $this->blog->where(['id' => $id])->first();
        if(!empty($blog->image)){
            file_remover('blog/images/', $blog->image);
        }
        $blog->delete();
        session()->flash('success', DEFAULT_200_DELETE['message']);
        return back();
    }

    public function status_update(string $id): JsonResponse
    {
        $this->blog->where('id', $id)->update(['is_active' => !$this->blog->find($id)->is_active]);
        return response()->json(response_structure(DEFAULT_200_UPDATE), 200);
    }
}
