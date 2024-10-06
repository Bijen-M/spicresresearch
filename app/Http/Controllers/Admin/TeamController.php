<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TeamCreate;
use App\Http\Requests\TeamUpdate;
use App\Models\Team;


class TeamController extends Controller
{
    protected $team;

    public function __construct(Team $team) {
        $this->team = $team;
    }

    public function index() {
        $breadcrumb = breadcrumb(['teams']);
        $status = $this->status;
        $teams = $this->team->with('department')->get();
        return view('admin.team.index', compact('teams', 'breadcrumb', 'status'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('team.index') => 'teams', 'trash']);
        $status = $this->status;
        $teams = $this->team->with('department')->onlyTrashed()->get();
        return view('admin.team.index', compact('teams', 'breadcrumb', 'status'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('team.index') => 'teams', 'all']);
        $status = $this->status;
        $teams = $this->team->with('department')->withTrashed()->get();
        return view('admin.team.index', compact('teams', 'breadcrumb', 'status'));
    }
    
    public function restore($id) {
        $this->team->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $team = $this->team->withTrashed()->findOrFail($id);
        $this->deleteImage($team);
        $team->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('team.index') => 'teams', 'create']);
        return view('admin.team.form', compact('breadcrumb'));
    }

    public function store(TeamCreate $request) {
        $team = $this->team->create($request->all());
        $this->upload($team);
        return redirect()->route('team.create')->with('success', 'Successfully Created.');
    }

    public function show(Team $team) {
        $breadcrumb = breadcrumb([route('team.index') => 'teams', 'show']);
        return view('admin.team.show', compact('team', 'breadcrumb'));
    }

    public function edit(Team $team) {
        $breadcrumb = breadcrumb([route('team.index') => 'teams', 'edit']);
        return view('admin.team.form', compact('team', 'breadcrumb'));
    }

    public function update(TeamUpdate $request, Team $team) {
        $team->update($request->all());
        $this->upload($team);
        return redirect()->route('team.edit', $team->id)->with('success', 'Successfully Updated.');
    }

    public function destroy(Team $team) {
        $team->delete();
        return redirect()->route('team.index')->with('success', 'Successfully Deleted.');
    }
}
