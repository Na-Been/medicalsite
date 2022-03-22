<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $categoriess = Category::where('category_type','products')->get();
        return view('admin.product.create',compact('categoriess'));
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
            'description' => 'required',
            'category_id' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required',
                'image.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
            ]);
        }
        try {
            DB::beginTransaction();
            $input = $request->all();
            if ($request->hasFile('image')) {
                $input['image'] = storeImage($request);
            }
            $input['slug'] = Str::slug($input['title'],'-');
            $input['category_id'] = $request->category_id;
            Product::create($input);
            DB::commit();
            return redirect()->route('product.index')->with('success','Product Created Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Product Cannot Create, Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categoriess = Category::where('category_type','products')->get();
        return view('admin.product.edit',compact('product','categoriess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required',
                'image.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
            ]);
        }
        try {
            $product = Product::findOrFail($id);
            $input = $request->all();
            DB::beginTransaction();
            if ($request->file('image')) {
                if (Storage::exists($product->image)) {
                    Storage::delete($product->image);
                }
            }
            if ($request->hasFile('image')) {
                $input['image'] = storeImage($request);
            }
            $input['slug'] = Str::slug($input['title'],'-');
            $input['category_id'] = $request->category_id;
            $product->update($input);
            DB::commit();
            return redirect()->route('product.index')->with('success', 'product Updated Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'product Cannot Be Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $dataId = request()->product_id;
            $findData = Product::findOrFail($dataId);
            $findData->delete();
            Storage::delete($findData->image);
            DB::commit();
            return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Product Cannot Be Deleted');
        }
    }
}
