<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Livewire\Admin\AsignarController;
use App\Http\Livewire\Web\Areas;
use App\Http\Livewire\Web\Schedules;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('roles', [RoleController::class, 'index'])->name('role.index');

Route::get('permisos', [PermissionController::class, 'index'])->name('permiso.index');

Route::get('asignar/Permisos', AsignarController::class)->name('asignar.Permisos');

Route::get('usuarios', [UserController::class, 'index'])->name('user.index');

Route::get('horarios', Schedules::class)->middleware('auth')->name('horarios');

Route::get('areas', Areas::class)->middleware('auth')->name('areas');
