<?php

namespace App\Http\Livewire\Reclutador;

use App\Models\Job;
use App\Models\Requirement;
use Livewire\Component;

class JobCurriculum extends Component
{
    public $job, $requirement, $name;

    protected $rules = [
        'requirement.name' => 'required',
    ];

    public function mount(Job $job)
    {
        $this->job = $job;
        $this->requirement = new Requirement();
    }

    public function render()
    {
        return view('livewire.reclutador.job-curriculum')->layout('layouts.reclutador');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        Requirement::create([
           'name' => $this->name,
           'job_id' => $this->job->id
        ]);

        $this->reset('name');
        $this->job = Job::find($this->job->id);
    }

    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
    }

    public function update()
    {
        $this->validate();

        $this->requirement->save();
        $this->requirement = new Requirement();

        $this->job = Job::find($this->job->id);
    }
}
