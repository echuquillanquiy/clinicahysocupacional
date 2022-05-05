<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Place;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $places = Place::all();
        $services = Service::all();
        $jobs = Job::where('status', '2')->latest('id')->take(8)->get();

        return view('welcome', compact('places', 'services', 'jobs'));
    }
}
