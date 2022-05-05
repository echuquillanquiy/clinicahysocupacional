<?php

namespace App\Http\Livewire\Web;

use App\Models\Schedule;
use Livewire\Component;
use Livewire\WithPagination;

class Schedules extends Component
{
    use WithPagination;

    public $componentName, $pageTitle, $search, $name, $selected_id;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Horarios';
    }

    public function render()
    {
        $schedules = Schedule::orderBy('id', 'desc')->paginate(4);

        return view('livewire.web.schedules.component', compact('schedules'))->extends('theme.app')->section('content');
    }

    public function Store()
    {
        $rules = [
            'name' => 'required|unique:schedules|min:3'
        ];

        $messages = [
            'name.required' => '* Nombre del horario es requerido.',
            'name.unique' => '* Ya existe el nombre del horario.',
            'name.min' => '* El nombre del horario debe tener al menos 3 caracteres.',
        ];

        $this->validate($rules, $messages);

        $schedule = Schedule::create([
            'name' => $this->name
        ]);

        $this->resetUI();
        $this->emit('schedule-added', 'Horario Agregado');
    }

    public function Edit(Schedule $schedule)
    {
        $this->name = $schedule->name;
        $this->selected_id = $schedule->id;

        $this->emit('show-modal', 'show modal!');
    }

    public function Update()
    {
        $rules = [
            'name' => "required|min:3|unique:schedules,name,{$this->selected_id}"
        ];

        $messages = [
            'name.required' => '* Nombre del horario es requerido.',
            'name.unique' => '* Ya existe el nombre del horario.',
            'name.min' => '* El nombre del horario debe tener al menos 3 caracteres.',
        ];

        $schedule = Schedule::find($this->selected_id);
        $schedule->update([
            'name' => $this->name
        ]);

        $this->resetUI();
        $this->emit('schedule-updated', 'Horario actualizado');
    }

    public function resetUI()
    {
        $this->search = '';
        $this->name = '';
        $this->selected_id = 0;

        $this->resetValidation();
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Schedule $schedule)
    {
        $schedule->delete();

        $this->resetUI();
        $this->emit('schedule-deleted', 'Horario eliminado');
    }
}
