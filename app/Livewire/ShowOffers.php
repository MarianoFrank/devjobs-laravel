<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

define("PER_PAGE", 8);

class ShowOffers extends Component
{
    public $offers;
    public $on_page = PER_PAGE;
    public $hasMore = true;
    public $cant_offers = 0;


    public function mount()
    {
        $this->offers = collect();
        $this->cant_offers = Offer::where("recruiter_id", Auth::user()->id)->count();
        $this->loadOffers();
    }

    public function loadOffers()
    {
        $newOffers = Offer::where("recruiter_id", Auth::user()->id)
            ->skip($this->offers->count())
            ->take(PER_PAGE)
            ->get();


        $this->offers = $this->offers->merge($newOffers);

        if ($this->offers->count() === $this->cant_offers) {
            $this->hasMore = false;
        }
    }

    public function loadMore(): void
    {
        if ($this->hasMore) {
            $this->on_page += PER_PAGE;
            $this->loadOffers();
        }
    }

    public function render()
    {

        return view('livewire.show-offers');
    }
}
