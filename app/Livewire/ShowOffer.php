<?php

namespace App\Livewire;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class ShowOffer extends Component
{
    public $offer;

    public function dowloadPdfOffer()
    {
        $pdf = PDF::loadView('pdf.offer-resume', [
            'offer' => $this->offer
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, str_replace(".", "_", $this->offer->title)  . now()->toDateString() . '.pdf');
    }

    public function render()
    {
        return view('livewire.show-offer');
    }
}
