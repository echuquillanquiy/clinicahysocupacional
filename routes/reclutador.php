<?php

use App\Http\Controllers\Reclutador\JobController;
use App\Http\Livewire\Reclutador\JobApplicant;
use App\Http\Livewire\Reclutador\JobBenefit;
use App\Http\Livewire\Reclutador\JobCurriculum;
use App\Http\Livewire\ReclutadorJobs;
use Illuminate\Support\Facades\Route;


Route::redirect('', 'reclutador/convocatorias');

Route::get('convocatorias', ReclutadorJobs::class)->name('job-index');

Route::resource('jobs', JobController::class)->names('jobs');

Route::get('jobs/{job}/curriculum', JobCurriculum::class)->name('job.curriculum');
Route::get('jobs/{job}/benefit', JobBenefit::class)->name('job.benefit');
Route::get('jobs/{job}/applicants', JobApplicant::class)->name('job.applicants');


//Route::get('Horarios', ScheduleController::class)->name('schedule');
//Route::get('Areas', AreaController::class)->name('areas');


