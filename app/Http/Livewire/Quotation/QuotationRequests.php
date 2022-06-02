<?php

namespace App\Http\Livewire\Quotation;

use App\Models\Quotation;
use Livewire\Component;

class QuotationRequests extends Component
{
    public function render()
    {
        $quotations = Quotation::all();

        return view('livewire.quotation.quotation-requests', compact('quotations'))->layout('layouts.app');
    }
}
