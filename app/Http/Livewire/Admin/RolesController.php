<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use App\Models\User;
use DB;

class RolesController extends Component
{
    use WithPagination;

    public $componentName, $pageTitle, $search, $roleName, $selected_id;
    private $pagination = 5;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Roles';
    }

    public function render()
    {
        if ($this->search)
            $roles = Role::where('name', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->pagination);
        else
            $roles = Role::orderBy('name', 'asc')
                ->paginate($this->pagination);

        return view('livewire.admin.roles.componente', compact('roles'));
    }

    public function Store()
    {
        $rules = [
            'roleName' => 'required|min:2|unique:roles,name'
        ];

        $messages = [
            'roleName.required' => 'El nombre del role es requerido.',
            'roleName.unique' => 'el role ya existe.',
            'roleName.min' => 'el rol debe tener al menos 2 carácteres.'
        ];

        $this->validate($rules, $messages);

        Role::create(['name' => $this->roleName]);

        $this->emit('role-added', 'Se registró con existo');
        $this->resetUI();
    }

    public function Edit(Role $role)
    {
        $this->selected_id = $role->id;
        $this->roleName = $role->name;

        $this->emit('show-modal', 'Show Modal!');
    }

    public function Update()
    {
        $rules = [
            'roleName' => "required|min:2|unique:roles,name,{$this->selected_id}"
        ];

        $messages = [
            'roleName.required' => 'El nombre del role es requerido.',
            'roleName.unique' => 'el role ya existe.',
            'roleName.min' => 'el rol debe tener al menos 2 carácteres.'
        ];

        $this->validate($rules, $messages);

        $role = Role::find($this->selected_id);

        $role->update([
            'name'=> $this->roleName
        ]);

        $this->emit('role-updated', 'Se actualizó el role con éxito.');
        $this->resetUI();
    }

    protected $listeners = ['destroy' => 'Destroy'];

    public function Destroy(Role $role)
    {
        $permissionsCount = $role->permissions->count();
        if ($permissionsCount > 0)
        {
            $this->emit('role-error', 'No se puede eliminar el role por que tiene permisos asociados.');
            return;
        }
        $role->delete();
        $this->emit('role-deleted', 'Sel eliminó el role con éxito.');
    }

    public function resetUI()
    {
        $this->roleName = '';
        $this->selected_id = 0;
        $this->search = '';
        $this->resetValidation();
    }
}
