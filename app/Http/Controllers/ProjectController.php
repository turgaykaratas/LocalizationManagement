<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Contracts\IProjectService;

class ProjectController extends Controller
{
    private $projectService;

    public function __construct(IProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->projectService->getProjectByLoginUser();

        return view('project.list', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \CreateProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $projects = $this->projectService->ceateProjectFromRequest($request);

        return redirect()->route('project.list');;
    }


}
