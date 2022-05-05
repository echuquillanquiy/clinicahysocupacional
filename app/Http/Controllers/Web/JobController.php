<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Place;
use App\Models\Service;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $places = Place::all();

        $jobs = Job::where('status', '2')->latest('id')->take(8)->get();

        return view('webPage.works.index', compact('places', 'services', 'jobs'));
    }

    public function applied(Job $job)
    {
        $job->applicants()->attach(auth()->user()->id);

        return back();
    }
}
