<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $testimonial = Testimonial::all();
        return view('admin.testimony.index', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.testimony.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $this->validated($request);
        if ($request->hasFile('image')) {
            $validated['image'] = $this->storeImage($request);
        }
        try {
            Testimonial::create($validated);
            return redirect()->route('testimony.index')->with('success', 'Testimony Created Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Testimony Cannot Create, Something Went Wrong');
        }
    }

    private function validated($request)
    {
        return $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'review' => 'required',
            'rating' => 'required'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param Testimonial $testimony
     * @return Application|Factory|View|Response
     */
    public function show(Testimonial $testimony)
    {
        return view('admin.testimony.show', compact('testimony'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Testimonial $testimony
     * @return Application|Factory|View|Response
     */
    public function edit(Testimonial $testimony)
    {
        return view('admin.testimony.edit', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Testimonial $testimony
     * @return RedirectResponse
     */
    public function update(Request $request, Testimonial $testimony)
    {
        $validated = $this->validated($request);
        if ($request->hasFile('image')) {
            if (Storage::exists($testimony->image)) {
                Storage::delete($testimony->image);
            }
            $validated['image'] = $this->storeImage($request);
        }
        try {
            $testimony->update($validated);
            return redirect()->route('testimony.index')->with('success', 'Testimony Updated Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Testimony Cannot Be Updated');
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
            $dataId = request()->testimony_id;
            $findData = Testimonial::findOrFail($dataId);
            $findData->delete();
            return redirect()->route('testimony.index')->with('success', 'Testimony Deleted Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Testimony Cannot Be Deleted');
        }
    }
}
