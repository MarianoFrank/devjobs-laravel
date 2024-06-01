<?php

namespace App\Models;


use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        "company",
        "expire",
        "description",
        "image",
        "recruiter_id",
        "published"
    ];

    public function expireFormated()
    {
        $date = Carbon::parse($this->expire)->isoFormat('dddd, D [de] MMMM [de] YYYY');
        return  ucfirst($date);
    }
}
