<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
            ]);
            $validated['image'] = storeImage($request);
        }
        try {
            News::create($validated);
            return redirect()->route('news.index')->with('success', 'News Created Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'News Cannot Create, Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View|Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View|Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required',
                    'image.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
                ]);
                if (Storage::exists($news->image)) {
                    Storage::delete($news->image);
                }
                $validated['image'] = storeImage($request);
            }
            $news->update($validated);
            DB::commit();
            return redirect()->route('news.index')->with('success', 'News Updated Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'News Cannot Be Updated');
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
            $dataId = request()->news_id;
            $findData = News::findOrFail($dataId);
            $findData->delete();
            Storage::delete($findData->image);
            DB::commit();
            return redirect()->route('news.index')->with('success', 'News Deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'News Cannot Be Deleted');
        }
    }
}
