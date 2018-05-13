<?php

namespace App\Contracts;

use Illuminate\Http\Request;
use App\Project;

interface IProjectService
{
    public function getProjectById(int $id) : Project;
    public function getProjectByLoginUser();
    public function ceateProjectFromRequest(Request $request);
}