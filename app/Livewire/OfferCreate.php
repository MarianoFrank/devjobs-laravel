<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Salary;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Component;

class OfferCreate extends Component
{

    use WithFileUploads;

    #[Validate('required|min:5|max:30|string')]
    public $title = "";

    #[Validate('required|integer|min:1|max:9')]
    public $salary = "";

    #[Validate('required|integer|min:1|max:10')]
    public $category = "";

    #[Validate('required|min:5|max:30|string')]
    public $company = "";

    #[Validate('required|date|after:today')]
    public $expire = "";

    #[Validate('required|min:20|max:3500|string')]
    public $description = "";

    #[Validate('required|image:jpg,jpeg,png,webp|max:1024')]
    public $image = "";

    public function save()
    {

        $this->validate();

        $path = $this->image->store("public/offers");
        $imageName = str_replace("public/offers/", "", $path);

        $offer = Offer::create(
            array_merge(
                $this->only(["title", "company", "expire", "description"]),
                [
                    "salary_id" => $this->salary,
                    "category_id" => $this->category,
                    "image" => $imageName,
                    "recruiter_id" => auth()->user()->id
                ]
            )
        );

        session()->flash('msg_success', __('Offer successfully created'));

        $this->redirect(route("dashboard"));
    }
    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();
        return view('livewire.offer-create', [
            "salaries" => $salaries,
            "categories" => $categories
        ]);
    }
}
