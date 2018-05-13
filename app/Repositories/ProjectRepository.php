<?php

namespace App\Repositories;

use App\Repositories\Core\Repository;
use App\Project;
use Auth;

class ProjectRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Project::class;
    }

    public function getByLoginUser()
    {
        if (Auth::user()->hasRole('admin')) {
            $projects = $this->all();
        } else {
            $projects = $this->model->with('user')->where('user_id', Auth::user()->id)->get();
        }
        
        return $projects;
    }

}