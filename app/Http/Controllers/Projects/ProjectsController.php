<?php
/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 4/30/18
 * Time: 4:31 PM
 */

namespace App\Http\Controllers\Projects;

use App\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{    public function index()
    {
        $projects = Project::orderBy('start', 'DESC')->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $project = new Project;

        $project->fill($request->all());

        $project->slug = strtolower(str_replace(' ', '-', trim($project->name)));

        $project->save();

        return redirect('/projects');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $project->fill($request->all());

        $project->save();

        return redirect('/projects');
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect('/projects');
    }
}