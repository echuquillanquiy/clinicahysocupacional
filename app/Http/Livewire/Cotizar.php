<?php

namespace App\Http\Livewire;

use App\Models\Quotation;
use Livewire\Component;

class Cotizar extends Component
{
    public $quotation;

    public function render()
    {
        return view('livewire.cotizar');
    }

    public function mount(Quotation $quotation)
    {
        $this->quotation = $quotation;
    }
}
