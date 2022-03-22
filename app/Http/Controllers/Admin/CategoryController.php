<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $categoriess = Category::all();
        return view('admin.category.index', compact('categoriess'));
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
            'name' => 'required|unique:categories',
            'category_type' => 'required'
        ]);
        try {
            $validated['slug'] = Str::slug($validated['name'], '-');
//            $validated['category_type'] = $request->category_type;
            Category::create($validated);
            return redirect()->route('category.index')->with('success', 'Category Added Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Something Went Wrong While Storing');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name,'.$request->category_id,
            'category_type'=>'required'
        ]);
        try {
            DB::beginTransaction();
            $category = Category::findOrFail($request->category_id);
            $validated['slug'] = Str::slug($validated['name'], '-');
            $category->update($validated);
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Category Updated Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Cannot Update Category');
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
        $category = Category::findOrFail(request()->category_id);
        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Category Deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Category Cannot  Be Deleted');
        }

    }
}
