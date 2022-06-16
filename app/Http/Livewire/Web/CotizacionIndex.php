<?php

namespace App\Http\Livewire\Web;

use App\Models\Quotation;
use Livewire\Component;
use function view;

use Livewire\WithFileUploads;

class CotizacionIndex extends Component
{
    use WithFileUploads;

    public $ruc, $name, $email, $phone, $contact, $position, $workers, $positions;

    public function render()
    {
        return view('livewire.cotizaciones.component-cotizacion');
    }

    public function Store()
    {
        $rules = [
            'ruc' => 'required|min:11',
            'name' => 'required|min:5',
            'email' => 'required|email|min:5',
            'phone' => 'required|min:9',
            'contact' => 'required|min:5',
            'position' => 'required|min:5',
            'workers' => 'required|min:1',
            'positions' => 'required|min:3'
        ];

        $messages = [
            'ruc.required' => 'El RUC es requerido.',
            'ruc.min' => 'El ruc debe tener mínimo 11 dígitos.',
            'name.required' => 'La razón social es requerida.',
            'name.min' => 'La razón social debe tener 5 carácteres.',
            'email.required' => 'El correo es requerido.',
            'email.email' => 'Colocar un email válido.',
            'phone.required' => 'El Teléfono es requerido.',
            'phone.min' => 'El número telefonico debe tener 9 dígitos.',
            'contact.required' => 'El nombre de contacto es requerido.',
            'contact.min' => 'El nombre debe tener mínimo 5 carácteres.',
            'position.required' => 'El cargo en la empresa es requerido.',
            'position.min' => 'El cargo debe tener mínimo 5 carácteres.',
            'workers.required' => 'El número de trabajadores es obligatorio.',
            'workers.min' => 'El número de trabajadores debe tener mínimo 1 dígito.',
            'positions.required' => 'Los cargos en la empresa son necesarios.',
            'positions.min' => 'Debe considerar mínimo un puesto de trabajo'
        ];

        $this->validate($rules, $messages);

        $quotation = Quotation::create([
            'ruc' => $this->ruc,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'contact' => $this->contact,
            'position' => $this->position,
            'workers' => $this->workers,
            'positions' => $this->positions
        ]);

        $this->resetUI();

        $this->emit('guardado', 'Enviaste tu solicitud correctamente');
    }

    public function resetUI()
    {
        $this->ruc = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->contact = '';
        $this->position = '';
        $this->workers = '';
        $this->positions = "";

        $this->resetValidation();
    }
}
