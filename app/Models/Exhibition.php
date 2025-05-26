<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    use HasFactory;

    protected $fillable = [
        'exhibition',
        'year',
    ];

    public function entries(){
        return $this->hasMany(ExhibitionEntries::class, 'exhibition_id','id');
    }
}
