<?php

namespace App\Http\Livewire\Reclutador;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class JobApplicant extends Component
{
    use WithPagination;

    public $job, $search;

    public function mount(Job $job)
    {
        $this->job = $job;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $applicants = $this->job->applicants()
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(7);

        return view('livewire.reclutador.job-applicant', compact('applicants'))->layout('layouts.reclutador');
    }
}
