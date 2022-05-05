<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Job;
use App\Models\Place;
use App\Models\Schedule;
use Livewire\Component;

class WorkIndex extends Component
{
    public function render()
    {
        $jobs = Job::where('status', 2)->latest('id')->take(12)->get();
        $places = Place::all();
        $categories = Area::all();
        $types = Schedule::all();

        return view('livewire.works.work-index', compact('places', 'categories', 'types', 'jobs'));
    }
}
