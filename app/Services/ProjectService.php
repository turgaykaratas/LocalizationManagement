<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use App\Project;
use App\Contracts\IProjectService;
use Illuminate\Http\Request;
use Auth;

class ProjectService implements IProjectService
{
    private $projects;

    public function __construct(ProjectRepository $projects)
    {
        $this->projects = $projects;
    }

    public function getProjectById(int $id) : Project
    {
        return $this->projects->find($id);
    }

    public function getProjectByLoginUser()
    {
        $projects = $this->projects->getByLoginUser();

        return $projects;
    }

    public function ceateProjectFromRequest(Request $request)
    {
        $project = $this->projects->create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);

        return $project;
    }
}