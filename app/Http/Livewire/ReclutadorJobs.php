<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

use Livewire\WithPagination;

class ReclutadorJobs extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $jobs = Job::where('title', 'LIKE', '%' . $this->search . '%')
            ->where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.reclutador-jobs', compact('jobs'));
    }
}
