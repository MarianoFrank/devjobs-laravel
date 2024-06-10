<?php

namespace App\Models;


use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function salary(): BelongsTo
    {
        return $this->belongsTo(Salary::class);
    }

    public function candidates(): belongsToMany
    {
        return $this->belongsToMany(User::class,'candidates')->withPivot('cv')->withTimestamps()->orderBy('created_at','DESC');
    }

    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
