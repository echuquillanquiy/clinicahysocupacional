<?php

namespace App\Http\Livewire\Reclutador;

use App\Models\Benefit;
use App\Models\Job;
use Livewire\Component;

class JobBenefit extends Component
{
    public $job, $benefit, $name;

    protected $rules = [
        'benefit.name' => 'required',
    ];

    public function mount(Job $job)
    {
        $this->job = $job;
        $this->benefit = new Benefit();
    }

    public function render()
    {
        return view('livewire.reclutador.job-benefit')->layout('layouts.reclutador');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        Benefit::create([
            'name' => $this->name,
            'job_id' => $this->job->id
        ]);

        $this->reset('name');
        $this->job = Job::find($this->job->id);
    }

    public function edit(Benefit $benefit)
    {
        $this->benefit = $benefit;
    }

    public function update()
    {
        $this->validate();

        $this->benefit->save();
        $this->benefit = new Benefit();

        $this->job = Job::find($this->job->id);
    }
}
