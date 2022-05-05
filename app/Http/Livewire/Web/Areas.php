<?php

namespace App\Http\Livewire\Web;

use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;

class Areas extends Component
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
        $this->componentName = 'Áreas';
    }

    public function render()
    {
        $areas= Area::orderBy('id', 'desc')->paginate(5);

        return view('livewire.web.areas.component', compact('areas'))->extends('theme.app')->section('content');
    }

    public function Store()
    {
        $rules = [
            'name' => 'required|unique:areas|min:3'
        ];

        $messages = [
            'name.required' => '* Nombre del horario es requerido.',
            'name.unique' => '* Ya existe el nombre del horario.',
            'name.min' => '* El nombre del horario debe tener al menos 3 caracteres.',
        ];

        $this->validate($rules, $messages);

        $area = Area::create([
            'name' => $this->name
        ]);

        $this->resetUI();
        $this->emit('area-added', 'Área Agregada');
    }

    public function Edit(Area $area)
    {
        $this->name = $area->name;
        $this->selected_id = $area->id;

        $this->emit('show-modal', 'show modal!');
    }

    public function Update()
    {
        $rules = [
            'name' => "required|min:3|unique:areas,name,{$this->selected_id}"
        ];

        $messages = [
            'name.required' => '* Nombre del area es requerida.',
            'name.unique' => '* Ya existe el nombre del area.',
            'name.min' => '* El nombre del area debe tener al menos 3 caracteres.',
        ];

        $area = Area::find($this->selected_id);
        $area->update([
            'name' => $this->name
        ]);

        $this->resetUI();
        $this->emit('area-updated', 'Área actualizada');
    }

    public function resetUI()
    {
        $this->search = '';
        $this->name = '';
        $this->selected_id = 0;

        $this->resetValidation();
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Area $area)
    {
        $area->delete();

        $this->resetUI();
        $this->emit('area-deleted', 'Área eliminado');
    }
}
