<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AboutRequest $request
     * @return RedirectResponse
     */
    public function store(AboutRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            if ($request->hasFile('image')) {
                $input['image'] = storeImage($request);
            }
            About::create($input);
            DB::commit();
            return redirect()->route('about.index')->with('success', 'About Us Created Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage() . $exception->getTraceAsString());
            return back()->with('failed', 'Cannot Add About Us');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param About $about
     * @return Application|Factory|View|Response
     */
    public function show(About $about)
    {
        return view('admin.about.view', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param About $about
     * @return Application|Factory|View|Response
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AboutRequest $request
     * @param About $about
     * @return RedirectResponse
     */
    public function update(AboutRequest $request, About $about)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            if (Storage::exists($about->image)) {
                Storage::delete($about->image);
            }
            $inputs['image'] = storeImage($request);
        }
        try {
            DB::beginTransaction();
            $about->update($inputs);
            DB::commit();
            return redirect()->route('about.index')->with('success', 'About Us Updated Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'About Us Cannot Be Updated');
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
            $dataId = request()->about_id;
            $findData = About::findOrFail($dataId);
            $findData->delete();
            Storage::delete($findData->image);
            DB::commit();
            return redirect()->route('about.index')->with('success', 'About Us Deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'About Us Cannot Be Deleted');
        }
    }
}
