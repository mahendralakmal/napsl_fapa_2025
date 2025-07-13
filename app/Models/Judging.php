<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judging extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_id',
        'mark',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function exhibitionEntry()
    {
        return $this->belongsTo(ExhibitionEntries::class, 'image_id', 'id');
    }
}
