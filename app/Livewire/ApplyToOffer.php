<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;
use App\Models\Candidate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Notifications\NewCandidate;
use Illuminate\Support\Facades\Auth;

class ApplyToOffer extends Component
{
    use WithFileUploads;

    #[Validate('required|mimes:pdf|max:2048')]
    public $cv;

    public $offer;

    public $already_applied = false;

    public function mount(Offer $offer)
    {
        $this->already_applied = Candidate::where('offer_id', $offer->id)->where('user_id', Auth::user()->id)->exists();

        $this->offer = $offer;
    }

    public function save()
    {
        if ($this->already_applied) {
            return;
        }

        $this->validate();

        $path = $this->cv->store("public/pdfs");
        $cvName = str_replace("public/pdfs/", "", $path);

        Candidate::create([
            "user_id" => Auth::user()->id,
            "offer_id" => $this->offer->id,
            "cv" => $cvName,
        ]);


        $this->offer->recruiter->notify(new NewCandidate(
            $this->offer->id,
            $this->offer->title,
            Auth::user()->id,
            Auth::user()->name
        ));

        session()->flash('msg_success', __('Sent successfully'));

        return redirect(route("offers.show", $this->offer->id));
    }

    public function render()
    {
        return view('livewire.apply-to-offer');
    }
}
