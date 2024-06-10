<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(Offer $offer)
    {
        
        return view("candidates.index", [
            "offer" => $offer
        ]);
    }
}
