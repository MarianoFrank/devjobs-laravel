<?php

namespace App\Models;

use App\Casts\MyDateFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected function casts(): array
    {
        return [
            'expire' => MyDateFormat::class,
        ];
    }
}
