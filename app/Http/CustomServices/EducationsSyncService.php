<?php
/**
 * Created by PhpStorm.
 * User: Dimsa
 * Date: 21.02.2020
 * Time: 0:07
 */

namespace App\Http\CustomServices;


use App\Education;

class EducationsSyncService
{
    protected $educations = [];
    protected $newEducations = [];

    public function __construct(array $educations = [], array $newEducations = [])
    {
        $this->educations = $educations;
        $this->newEducations = $newEducations;
    }

    public function process()
    {
        $this->updatingData();
        $this->creatingData();
        $this->deletingData();
    }

    protected function updatingData()
    {
        foreach($this->educations as $key => $edu){
            if(isset($this->newEducations[$edu])){
                $education = Education::find($edu);
                $education->update($this->newEducations[$edu]);
                unset($this->educations[$key]);
                unset($this->newEducations[$edu]);
            }
        }
    }

    protected function creatingData()
    {
        foreach ($this->newEducations as $newEducation) {
            $newEducation['user_id'] = auth()->id();
            Education::create($newEducation);
        }
    }

    protected function deletingData()
    {
        Education::destroy($this->educations);
    }
}