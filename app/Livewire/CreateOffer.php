<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class CreateOffer extends Component
{
    #[Validate('required')]
    public $title = "";

    // #[Validate('required')]
    // public $salary;

    // #[Validate('required')]
    // public $category;

    // #[Validate('required')]
    // public $company;

    // #[Validate('required')]
    // public $expiration;

    // #[Validate('required')]
    // public $description;

    // #[Validate('required')]
    // public $image;

   

    public function save()
    {
      $this->validate();

    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-offer', [
            "salaries" => $salaries,
            "categories" => $categories
        ]);
    }
}
