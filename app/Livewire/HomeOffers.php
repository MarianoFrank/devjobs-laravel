<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class HomeOffers extends Component
{
    use WithPagination;


    public $query;
    public $category;
    public $salary;

    #[On('search-offer')]
    public function search($query, $category, $salary)
    {
        $this->query = $query;
        $this->category = $category;
        $this->salary = $salary;
    }

    public function render()
    {

        $offers = Offer::when($this->query, function ($query) {
            $query->where("title", "LIKE", "%" .  $this->query . "%");
        })
            ->when($this->query, function ($query) {
                $query->orWhere("company", "LIKE", "%" .  $this->query . "%");
            })
            ->when($this->category, function ($query) {
                $query->where("category_id", $this->category);
            })
            ->when($this->salary, function ($query) {
                $query->where("salary_id", $this->salary);
            })
            ->orderByDesc("created_at")->paginate(9);


        return view('livewire.home-offers', [
            'offers' => $offers,
        ]);
    }
}
