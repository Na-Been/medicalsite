<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            Slider::create($validated);
            return redirect()->route('slider.index')->with('success', 'Slider Created Successfully');
        } catch (\Exception $exception) {
            return back()->with('failed', 'Cannot Store Slider');
        }
    }

    private function validated($request)
    {
        return $validated = $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'rank' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Slider $slider
     * @return Application|Factory|View|Response
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.view', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $slider
     * @return Application|Factory|View|Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $this->validated($request);
        if ($request->hasFile('image')) {
            if (Storage::exists($slider->image)){
                Storage::delete($slider->image);
            }
            $validated['image'] = $this->storeImage($request);
        }
        try {
            $slider->update($validated);
            return redirect()->route('slider.index')->with('success', 'Slider Updated Successfully');
        } catch (\Exception $exception) {
            return back()->with('failed', 'Cannot Update Slider');
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
            $slider = request()->slider_id;
            $findData = Slider::findOrFail($slider);
            $findData->delete();
            Storage::delete($findData->image);
            DB::commit();
            return redirect()->route('slider.index')->with('success', 'Slider Deleted Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Slider Cannot Be Deleted');
        }
    }
}
