<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FapaInternationalAwards;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'fapa_international_award_id',
        'status',
    ];

    public function fapaInternationalAward()
    {
        return $this->belongsTo(FapaInternationalAwards::class);
    }
}
