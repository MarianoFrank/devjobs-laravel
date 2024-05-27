<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

define("PER_PAGE", 8);

class ShowOffers extends Component
{
    public $offers;
    public $on_page =  PER_PAGE;
    public $hasMore = true;
    public $loading = false;

    public function mount()
    {
        $this->offers = collect();
        $this->loadOffers();
    }

    public function loadOffers()
    {
        $newOffers = Offer::where("recruiter_id", Auth::user()->id)
            ->skip($this->offers->count())
            ->take(PER_PAGE)
            ->get();

        $this->offers = $this->offers->merge($newOffers);

        if ($newOffers->count() < PER_PAGE) {
            $this->hasMore = false;
        }
    }

    public function loadMore(): void
    {
        if ($this->hasMore) {
            $this->loading = true;
            sleep(2);

            $this->on_page += PER_PAGE;
            $this->loadOffers();
            $this->loading = false;
        }
    }

    public function render()
    {
        return view('livewire.show-offers');
    }
}
