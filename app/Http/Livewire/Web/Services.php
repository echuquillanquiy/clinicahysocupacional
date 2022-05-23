<?php

namespace App\Http\Livewire\Web;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Services extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $componentName, $pageTitle, $search, $selected_id, $name, $description, $image;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->componentName = 'Servicios';
        $this->pageTitle = 'Listado';
    }


    public function render()
    {
        if (strlen($this->search))
            $services = Service::where('name', 'LIKE', '%' . $this->search . '%')
                ->orderBy('id', 'asc')
                ->paginate(10);
        else
            $services = Service::orderBy('id', 'asc')
                ->paginate(10);

        return view('livewire.web.services', compact('services'));
    }

    public function Edit(Service $service)
    {
        $this->selected_id = $service->id;
        $this->name = $service->name;
        $this->description = $service->description;
        $this->image = null;

        $this->emit('show-modal', 'Show modal');
    }

    public function Store()
    {
        $rules = [
            'name' => 'required|unique:services|min:3',
            'description' => 'required|min:8',
            'image' => 'required'
        ];

        $messages = [
            'name.required' => 'El nombre del servicio es requerido.',
            'name.unique' => 'El servicio es único.',
            'name.mim' => 'El nombre debe tener mínimo 3 caracteres.',
            'description.required' => 'La descripción es requerida.',
            'description.mim' => 'La descripción debe tener mínimo 8 caracteres.',
            'image.required' => 'La imagen es requerida.'
        ];

        $this->validate($rules, $messages);

        $service = Service::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/services', $customFileName);
            $service->image = $customFileName;
            $service->save();
        }

        $this->resetUI();
        $this->emit('service-added', 'Servicio Registrado');
    }

    public function Update()
    {
        $rules = [
            'name' => "required|min:3|unique:services,name,{$this->selected_id}",
            'description' => 'required|min:8',
        ];

        $messages = [
            'name.required' => 'El nombre del servicio es requerido.',
            'name.unique' => 'El servicio es único.',
            'name.mim' => 'El nombre debe tener mínimo 3 caracteres.',
            'description.required' => 'La descripción es requerida.',
            'description.mim' => 'La descripción debe tener mínimo 8 caracteres.',
        ];

        $this->validate($rules, $messages);

        $service = Service::find($this->selected_id);

        $service->update([
            'name' => $this->name,
            'description' => $this->description
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/services/', $customFileName);
            $imageTemp = $service->image;
            $service->image = $customFileName;
            $service->save();

            if ($imageTemp != null) {
                if (file_exists('storage/services/' . $imageTemp)) {
                    unlink('storage/services/' . $imageTemp);
                }
            }
        }

        $this->resetUI();
        $this->emit('service-updated', 'Servicio Actualizado');
    }

    public function resetUI()
    {
        $this->selected_id = 0;
        $this->name = "";
        $this->description = "";
        $this->image = '';

        $this->resetValidation();
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Service $service)
    {
        $imageTemp = $service->image;
        $service->delete();

        if ($imageTemp != null) {
            if (file_exists('storage/services/' . $imageTemp)) {
                unlink('storage/services/' . $imageTemp);

            }
        }

        $this->resetUI();
        $this->emit('service-deleted', 'Servicio Eliminado');
    }
}
