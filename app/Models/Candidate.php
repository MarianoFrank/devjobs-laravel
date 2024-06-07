<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'offer_id',
        'cv'
    ];

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
