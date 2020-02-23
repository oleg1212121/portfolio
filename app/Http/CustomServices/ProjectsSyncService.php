<?php
/**
 * Created by PhpStorm.
 * User: Dimsa
 * Date: 20.02.2020
 * Time: 23:25
 */

namespace App\Http\CustomServices;


use App\Project;

class ProjectsSyncService
{
    protected $projects = [];
    protected $newProjects = [];

    public function __construct(array $projects = [], array $newProjects = [])
    {
        $this->projects = $projects;
        $this->newProjects = $newProjects;
    }

    public function process()
    {
        $this->updatingData();
        $this->creatingData();
        $this->deletingData();
    }

    protected function updatingData()
    {
        foreach($this->projects as $key => $proj){
            if(isset($this->newProjects[$proj])){
                $project = Project::find($proj);
                $project->update($this->newProjects[$proj]);
                unset($this->projects[$key]);
                unset($this->newProjects[$proj]);
            }
        }

    }

    protected function creatingData()
    {
        foreach ($this->newProjects as $newProject) {
            $newProject['user_id'] = auth()->id();
            Project::create($newProject);
        }
    }

    protected function deletingData()
    {
        Project::destroy($this->projects);
    }
}