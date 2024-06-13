<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class SearchOffer extends Component
{
    public $query;
    public $selectedCategory;
    public $selectedSalary;

    public function emitSearch()
    {
        $this->dispatch('search-offer', $this->query, $this->selectedCategory, $this->selectedSalary);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.search-offer', [
            "salaries" => $salaries,
            "categories" => $categories
        ]);
    }
}
