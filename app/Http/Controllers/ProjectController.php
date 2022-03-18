<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectIds = Project::get('id');

        $projects = DB::table('projects as p')
            ->join('groups as g', 'p.id', '=', 'g.project_id')
            ->select('g.gr_stud_count', 'p.id', 'p.proj_title', 'p.proj_groups_count')
            ->whereIn('p.id', $projectIds)
            ->distinct()
            ->orderByDesc('p.id')
            ->get();

        return view('create-project', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $project = new Project();
        $project->proj_title = $request->input('proj_title');
        $project->proj_groups_count = $request->input('proj_groups_count');
        $project->save();

        $groupsCount = (int)$request->input('proj_groups_count');

        $groupsArray = [];

        for ($i = 1; $i <= $groupsCount; $i++) {
            $group = new Group();

            $group->gr_name = 'Group #' . $i;
            $group->gr_stud_count = $request->input('gr_stud_count');
            $group->project_id = $project->id;
            $group->save();

            $groupsArray[] = $group;
        }

        $project->groups()->saveMany($groupsArray);

        return redirect()->route('projects')
            ->with('successProject', 'Project created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $students = Student::with('groups')->get();
//        dd($students);

        $groups = $project->groups()
                ->get();

        $studPerGroupCount = DB::table('projects as p')
            ->join('groups as g', 'p.id', '=', 'g.project_id')
            ->select('g.gr_stud_count')
            ->whereIn('p.id', $project)
            ->distinct()
            ->get();

        $studInGroups = Group::with('students')
            ->whereIn('project_id', $project)
            ->has('students')
            ->get();


        return view('project-status',
            compact('students',
                'project',
                'groups',
                'studPerGroupCount',
                'studInGroups'
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects')->with('deleteProject', 'Project was deleted');
    }
}
