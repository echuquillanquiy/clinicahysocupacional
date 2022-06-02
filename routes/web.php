<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\JobController;
use App\Http\Controllers\Web\PlaceController;
use App\Http\Controllers\Web\QoutationController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Livewire\Quotation\QuotationRequests;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('trabajos', [JobController::class, 'index'])->name('trabajos.index');

Route::post('job/{job}/applied', [JobController::class, 'applied'])->middleware('auth')->name('work.applied');

Route::resource('sedes', PlaceController::class)->middleware('auth')->names('places');

Route::get('servicios', [ServiceController::class, 'index'])->name('servicios.index')->middleware('auth');

Route::get('cotizaciones', [QoutationController::class, 'index'])->name('cotizaciones');

Route::get('cotizaciones/solicitudes', QuotationRequests::class)->name('solicitudes')->middleware('auth');
