<?php

namespace App\Http\Controllers\Reclutador;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Job;
use App\Models\Place;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::pluck('name', 'id');
        $schedules = Schedule::pluck('name', 'id');
        $places = Place::pluck('name', 'id');

        return view('jobs.reclutador.create', compact('areas', 'schedules', 'places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:jobs',
            'subtitle' => 'required',
            'description' => 'required',
            'schedule_id' => 'required',
            'area_id' => 'required',
            'place_id' => 'required',
            'ending' => 'required',
            'file' => 'required|image'
        ];

        $messages = [
            'title.required' => 'El Título es requerido.',
            'slug.required' => 'El Slug es requerido.',
            'subtitle.required' => 'El Subtítulo es requerido.',
            'description.required' => 'La Descripción es requerida.',
            'schedule_id.required' => 'Seleccione un Horario.',
            'area_id.required' => 'Seleccione un Área.',
            'place_id.required' => 'Seleccione una Sede.',
            'ending.required' => 'La fecha final es requerida.',
            'file.required' => 'La imagen es requerida.',
            'file.image' => 'Seleccione una imagen válida.'
        ];

        $request->validate($rules, $messages);

        $job = Job::create($request->all());

        if ($request->file('file')){
            $url = Storage::put('public/jobs', $request->file('file'));

            $job->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('reclutador.jobs.edit', $job);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $areas = Area::pluck('name', 'id');
        $schedules = Schedule::pluck('name', 'id');
        $places = Place::pluck('name', 'id');

        return view('jobs.reclutador.edit', compact('job', 'areas', 'schedules', 'places'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:jobs,slug,' . $job->id,
            'subtitle' => 'required',
            'description' => 'required',
            'schedule_id' => 'required',
            'area_id' => 'required',
            'place_id' => 'required',
            'ending' => 'required',
            'file' => 'image'
        ];

        $messages = [
            'title.required' => 'El Título es requerido.',
            'slug.required' => 'El Slug es requerido.',
            'subtitle.required' => 'El Subtítulo es requerido.',
            'description.required' => 'La Descripción es requerida.',
            'schedule_id.required' => 'Seleccione un Horario.',
            'area_id.required' => 'Seleccione un Área.',
            'place_id.required' => 'Seleccione una Sede.',
            'ending.required' => 'La fecha final es requerida.',
            'file.image' => 'Seleccione una imagen válida.'
        ];

        $request->validate($rules, $messages);

        $job->update($request->all());

        if ($request->file('file')){
            $url = Storage::put('public/jobs', $request->file('file'));

            if ($job->image){
                Storage::delete($job->image->url);

                $job->image->update([
                    'url' => $url
                ]);
            }else {
                $job->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('reclutador.jobs.edit',$job);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
