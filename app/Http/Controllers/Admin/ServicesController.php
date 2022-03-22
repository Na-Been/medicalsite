<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $categories = Category::where('category_type', 'services')->get();
        return view('admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $this->validateData($request);
        if ($request->hasFile('image')) {
            $validated['image'] = $this->storeImage($request);
        }
        try {
            DB::beginTransaction();
            $validated['slug'] = Str::slug($validated['name'], '-');
            $validated['category_id'] = $request->category_id;
            Service::create($validated);
            DB::commit();
            return redirect()->route('services.index')->with('success', 'Services Created Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Cannot Store Services');
        }
    }

    private function validateData($request)
    {
        return $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'index_number'=>'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View|Response
     */
    public function show(Service $service)
    {
        return view('admin.services.view', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View|Response
     */
    public function edit(Service $service)
    {
        $categories = Category::where('category_type', 'services')->get();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service)
    {
        $validated = $this->validateData($request);
        if ($request->hasFile('image')) {
            if (Storage::exists($service->image)) {
                Storage::delete($service->image);
            }
            $validated['image'] = $this->storeImage($request);
        }
        try {
            DB::beginTransaction();
            $validated['slug'] = Str::slug($validated['name'], '-');
            $validated['category_id'] = $request->category_id;
            $service->update($validated);
            DB::commit();
            return redirect()->route('services.index')->with('success', 'Services Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Services Cannot Be Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $dataId = request()->service_id;
            $findData = Service::findOrFail($dataId);
            $findData->delete();
            Storage::delete($findData->image);
            DB::commit();
            return redirect()->route('services.index')->with('success', 'Services Deleted Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Services Cannot Be Deleted');
        }

    }
}
