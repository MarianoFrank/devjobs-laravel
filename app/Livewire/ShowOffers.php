<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
            ->withCount('candidates')
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

    #[On('delete-offer')]
    public function handleDelete(Offer $offer)
    {
        Gate::authorize('delete', $offer);
        $offer->delete();

        //quitamos de la collecion la oferta eliminada, para que se actualice el frontend
        $this->offers = $this->offers->reject(function (Offer $value, int $key) use ($offer) {
            return $value->id === $offer->id;
        });
    }

    public function render()
    {

        return view('livewire.show-offers');
    }
}
