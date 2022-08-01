<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class Usuario extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $search, $pageSelected, $selected_id, $name, $lastname, $username, $phone,$email, $status, $password, $profile, $place;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Usuarios';
        $this->pageSelected = 10;
        $this->status = 'Elegir';
        $this->place = 'Elegir';
    }

    public function render()
    {
        if ($this->search)
            $usuarios = User::where('name', 'LIKE', '%' . $this->search . '%')
                ->select('*')->orderBy('name', 'asc')->paginate($this->pageSelected);
        else
            $usuarios = User::select('*')->orderBy('name', 'asc')->paginate($this->pageSelected);

        $roles = Role::orderBy('name', 'asc')->get();

        return view('livewire.admin.usuarios.componente', compact('usuarios', 'roles'));
    }

    public function resetUI()
    {
        $this->name = '';
        $this->lastname = '';
        $this->username = '';
        $this->email = '';
        $this->phone = '';
        $this->password = '';
        $this->search = '';
        $this->status = 'Elegir';
        $this->selected_id = 0;
        $this->place = 'Elegir';
        $this->resetValidation();
    }

    public function Edit(User $user)
    {
        $this->selected_id = $user->id;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->username = $user->username;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->profile = $user->profile;
        $this->status = $user->status;
        $this->place = $user->place;
        $this->password = '';

        $this->emit('show-modal', 'Show Modal!');
    }

    protected $listeners = [
        'deleteRow' => 'Destroy',
        'resetUI' => 'resetUI'
    ];

    public function Store()
    {
        $rules = [
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'username' => 'required|min:3',
            'phone' => 'required|min:9',
            'email' => 'required|unique:users|email',
            'status' => 'required|not_in:Elegir',
            'profile' => 'required|not_in:Elegir',
            'password' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'Ingresa el nombre.',
            'name.min' => 'El nombre del usuario debe tener al menos 3 caracteres.',
            'lastname.required' => 'Ingresa el apellido.',
            'lastname.min' => 'El apellido del usuario debe tener al menos 3 caracteres.',
            'username.required' => 'Ingresa el nombre de usuario.',
            'username.min' => 'El usuario debe tener al menos 3 caracteres.',
            'phone.required' => 'Ingresa el número celular.',
            'phone.min' => 'El número celular debe tener al menos 9 caracteres.',
            'email.required' => 'Ingrese el válido.',
            'email.email' => 'Ingrese un correo válido.',
            'email.unique' => 'El correo ya existe en el sistema.',
            'status.required' => 'Selecciona el estado para el usuario.',
            'profile.required' => 'Seleccione el perfil /role del usuario.',
            'password.required' => 'Ingresa una contraseña.',
            'password.min' => 'el password debe tener minimo 3 caracteres.',
            'status.not_in' => 'Selecciona un estado distinto a Elegir.',
            'profile.not_in' => 'Selecciona un perfil/role distinto a Elegir.',
        ];

        $this->validate($rules, $messages);

        $user = User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'phone' => $this->phone,
            'email' => $this->email,
            'status' => $this->status,
            'profile' => $this->profile,
            'place' => $this->place,
            'password' => bcrypt($this->password)
        ]);

        $user->syncRoles($this->profile);

        $this->resetUI();
        $this->emit('usuario-added', 'Usuario Registrado');
    }

    public function Update()
    {
        $rules = [
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'username' => 'required|min:3',
            'phone' => 'required|min:9',
            'email' => "required|unique:users,email,{$this->selected_id}",
            'status' => 'required|not_in:Elegir',
            'profile' => 'required|not_in:Elegir',
        ];

        $messages = [
            'name.required' => 'Ingresa el nombre.',
            'name.min' => 'El nombre del usuario debe tener al menos 3 caracteres.',
            'lastname.required' => 'Ingresa el apellido.',
            'lastname.min' => 'El apellido del usuario debe tener al menos 3 caracteres.',
            'username.required' => 'Ingresa el nombre de usuario.',
            'username.min' => 'El usuario debe tener al menos 3 caracteres.',
            'phone.required' => 'Ingresa el número celular.',
            'phone.min' => 'El número celular debe tener al menos 9 caracteres.',
            'email.required' => 'Ingrese el válido.',
            'email.email' => 'Ingrese un correo válido.',
            'email.unique' => 'El correo ya existe en el sistema.',
            'status.required' => 'Selecciona el estado para el usuario.',
            'profile.required' => 'Seleccione el perfil /role del usuario.',
            'status.not_in' => 'Selecciona un estado distinto a Elegir.',
            'profile.not_in' => 'Selecciona un perfil/role distinto a Elegir.',
        ];

        $this->validate($rules, $messages);

        $user = User::find($this->selected_id);

        if (strlen($this->password))
            $user->update([
                'name' => $this->name,
                'lastname' => $this->lastname,
                'username' => $this->username,
                'phone' => $this->phone,
                'email' => $this->email,
                'status' => $this->status,
                'profile' => $this->profile,
                'place' => $this->place,
                'password' => bcrypt($this->password)
            ]);
        else
            $user->update([
                'name' => $this->name,
                'lastname' => $this->lastname,
                'username' => $this->username,
                'phone' => $this->phone,
                'email' => $this->email,
                'status' => $this->status,
                'profile' => $this->profile,
                'place' => $this->place,
            ]);

        $user->syncRoles($this->profile);

        $this->resetUI();
        $this->emit('usuario-updated', 'Usuario Actualizado');
    }

    /*public function Destroy(User $user)
    {
        if ($user) {
            $orders = Order::where('user_id', $user->id)->count();
            if ($orders > 0) {
                $this->emit('user-withorders', 'No es posible eliminar el usuario por que tiene ordenes registradas');
            }else {
                $user->delete();
                $this->resetUI();
                $this->emit('usuario-deleted', 'Usuarios Eliminado!.');
            }
        }
    }*/
}
