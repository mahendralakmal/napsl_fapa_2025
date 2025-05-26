<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExhibitionEntries extends Model
{
    use HasFactory;

    protected $fillable = [
        'exhibition_id',
        'image_caption',
        'image',
        'user_id',
        'count',
        'section'
    ];

    public function exhibition(){
        return $this->belongsTo(Exhibition::class, 'exhibition_id', 'id');
    }
}
