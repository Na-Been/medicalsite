<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.team.create');
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
            Team::create($validated);
            return redirect()->route('team.index')->with('success', 'Team Create Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Team Cannot Create.Something Went Wrong');
        }
    }

    private function validated($request, $id=null)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required|unique:teams,email,'.$id,
            'education' => 'required',
            'post' => 'required',
            'number' => 'required|min:10',
            'address' => 'required',
            'description' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return Application|Factory|View|Response
     */
    public function show(Team $team)
    {
        return view('admin.team.view', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return Application|Factory|View|Response
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Team $team
     * @return RedirectResponse
     */
    public function update(Request $request, Team $team)
    {
        $validated = $this->validated($request, $team->id);
        if ($request->hasFile('image')) {
            if (Storage::exists($team->image)){
                Storage::delete($team->image);
            }
            $validated['image'] = $this->storeImage($request);
        }
        try {
            $team->update($validated);
            return redirect()->route('team.index')->with('success', 'Team Updated Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Team Cannot Be Updated.Something Went Wrong');
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
            $data = request()->team_id;
            $team = Team::findOrFail($data);
            DB::beginTransaction();
            $team->delete();
            Storage::delete($team->image);
            DB::commit();
            return redirect()->route('team.index')->with('success', 'Team Deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Sorry Team Cannot Be Deleted');
        }
    }
}
