<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use App\Models\User;
use DB;

class Permiso extends Component
{
    use WithPagination;

    public $componentName, $pageTitle, $search, $permissionName, $selected_id;
    private $pagination = 10;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Permisos';
    }

    public function render()
    {
        if ($this->search)
            $permisos = Permission::where('name', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pagination);
        else
            $permisos = Permission::orderBY('name', 'asc')
                ->paginate($this->pagination);

        return view('livewire.admin.permisos.componente', compact('permisos'));
    }

    public function Store()
    {
        $rules = [
            'permissionName' => 'required|min:2|unique:permissions,name'
        ];

        $messages = [
            'permissionName.required' => 'El nombre del permiso es requerido.',
            'permissionName.unique' => 'el permiso ya existe.',
            'permissionName.min' => 'el permiso debe tener al menos 2 carácteres.'
        ];

        $this->validate($rules, $messages);

        Permission::create(['name' => $this->permissionName]);

        $this->emit('permiso-added', 'Se registró con existo');
        $this->resetUI();
    }

    public function Edit(Permission $permission)
    {
        $this->selected_id = $permission->id;
        $this->permissionName = $permission->name;

        $this->emit('show-modal', 'Show Modal!');
    }

    public function Update()
    {
        $rules = [
            'permissionName' => "required|min:2|unique:permissions,name,{$this->selected_id}"
        ];

        $messages = [
            'permissionName.required' => 'El nombre del permiso es requerido.',
            'permissionName.unique' => 'el permiso ya existe.',
            'permissionName.min' => 'el permiso debe tener al menos 2 carácteres.'
        ];

        $this->validate($rules, $messages);

        $permisos = Permission::find($this->selected_id);

        $permisos->update([
            'name'=> $this->permissionName
        ]);

        $this->emit('permiso-updated', 'Se actualizó el permiso con éxito.');
        $this->resetUI();
    }

    protected $listeners = ['destroy' => 'Destroy'];

    public function Destroy(Permission $permission)
    {
        $rolesCount = $permission->getRoleNames()->count();
        if ($rolesCount > 0)
        {
            $this->emit('permiso-error', 'No se puede eliminar el permiso por que tiene permisos asociados.');
            return;
        }
        $permission->delete();
        $this->emit('permiso-deleted', 'Sel eliminó el permiso con éxito.');
    }

    public function resetUI()
    {
        $this->permissionName = '';
        $this->selected_id = 0;
        $this->search = '';
        $this->resetValidation();
    }
}
