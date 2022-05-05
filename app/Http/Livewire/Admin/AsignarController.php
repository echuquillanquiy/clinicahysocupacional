<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;

class AsignarController extends Component
{
    use WithPagination;

    public $role, $componentName, $permisosSelected = [], $oldpermissions = [];
    private $paginattion = 10;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->role = 'Elegir';
        $this->componentName = 'Asignar Permisos';
    }

    public function render()
    {
        $permisos = Permission::select('name', 'id', DB::raw("0 as checked"))
            ->orderBy('name', 'asc')
            ->paginate($this->paginattion);
        if ($this->role != 'Elegir')
        {
            $list = Permission::join('role_has_permissions as rp', 'rp.permission_id', 'permissions.id')
                ->where('role_id', $this->role)->pluck('permissions.id')->toArray();

            $this->oldpermissions = $list;
        }

        if ($this->role != 'Elegir')
        {
            foreach ($permisos as $permiso){
                $role = \Spatie\Permission\Models\Role::find($this->role);
                $tienePermiso = $role->hasPermissionTo($permiso->name);
                if ($tienePermiso){
                    $permiso->checked = 1;
                }
            }
        }
        $roles = Role::orderBy('name', 'asc')->get();

        return view('livewire.admin.asignar.componente', compact('roles', 'permisos'))->extends('theme.app')->section('content');
    }

    public $listeners = ['revokeall' => 'RemoveAll'];

    public function RemoveAll()
    {
        if ($this->role == 'Elegir')
        {
            $this->emit('sync-error', 'Seleccione un role  válido');
            return;
        }

        $role = Role::find($this->role);
        $role->syncPermissions([0]);
        $this->emit('removeall', "Se revocaron todos los permisos al role $role->name");
    }

    public function SyncAll()
    {
        if ($this->role == 'Elegir')
        {
            $this->emit('sync-error', 'Seleccione un role  válido');
            return;
        }
        $role = Role::find($this->role);
        $permisos = Permission::pluck('id')->toArray();
        $role->syncPermissions($permisos);
        $this->emit('syncall', "Se sincronizaron todos los permisos al role $role->name");
    }

    public function syncPermiso($state, $permisoName)
    {
        if ($this->role != 'Elegir')
        {
            $roleName = Role::find($this->role);

            if ($state)
            {
                $roleName->givePermissionTo($permisoName);
                $this->emit('permi', "Permiso asignado correctamente");
            } else {
                $roleName->revokePermissionTo($permisoName);
                $this->emit('permi', "Permiso eliminado correctamente");
            }
        } else {
            $this->emit('sync-error', "Elige un rol válido");
        }
    }
}
