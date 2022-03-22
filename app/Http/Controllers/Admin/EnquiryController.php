<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $enquiries = Enquiry::all();
        return view('admin.enquiry.index', compact('enquiries'));
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
            'name' => 'required',
            'email' => 'required',
            'query' => 'required'
        ]);
        try {
            $input = $request->all();
            Enquiry::create($input);
            return back()->with('success', 'Enquiry Created Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Enquiry Cannot Create, Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Enquiry $enquiry
     * @return Application|Factory|View|Response
     */
    public function show(Enquiry $enquiry)
    {
        return view('admin.enquiry.show', compact('enquiry'));
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
            $dataId = request()->enquiry_id;
            $findData = Enquiry::findOrFail($dataId);
            $findData->delete();
            return redirect()->route('enquiry.index')->with('success', 'Enquiry Deleted Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Enquiry Cannot Be Deleted');
        }
    }
}
