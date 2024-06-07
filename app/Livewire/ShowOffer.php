<?php

namespace App\Livewire;

use Livewire\Component;

class ShowOffer extends Component
{
    public $offer;

    public function dowloadPdfOffer()
    {


        // return response()->download(
        //     $this->invoice->file_path, 'invoice.pdf'
        // );
    }

    public function render()
    {
        return view('livewire.show-offer');
    }
}
