<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fapa2025ExhibitionSummary extends Model
{
    protected $table = 'fapa_2025_exhibition_summary';

    // Since it's a view, disable timestamps and set primary key if needed
    public $timestamps = false;

    protected $primaryKey = 'user_id'; // or null if no primary key
    public $incrementing = false;
}
