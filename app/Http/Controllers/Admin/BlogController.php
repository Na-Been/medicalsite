<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'added_by' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required',
                'image.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
            ]);
        }
        try {
            $input = $request->all();
            if ($request->hasFile('image')) {
                $input['image'] = storeImage($request);
            }
            Blog::create($input);
            return redirect()->route('blog.index')->with('success', 'Blog Created Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Blog Cannot Create, Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return Application|Factory|View|Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Blog $blog
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'title' => 'required',
            'added_by' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required',
                'image.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
            ]);
        }
        try {
            $input = $request->all();
            DB::beginTransaction();
            if ($request->file('image')) {
                if (Storage::exists($blog->image)) {
                    Storage::delete($blog->image);
                }
                $input['image'] = storeImage($request);
            }
            $blog->update($input);
            DB::commit();
            return redirect()->route('blog.index')->with('success', 'Blog Updated Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Blog Cannot Be Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $dataId = request()->blog_id;
            $findData = Blog::findOrFail($dataId);
            $findData->delete();
            Storage::delete($findData->image);
            DB::commit();
            return redirect()->route('blog.index')->with('success', 'Blog Deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Blog Cannot Be Deleted');
        }
    }
}
