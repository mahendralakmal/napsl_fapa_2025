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

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function judgings()
    {
        return $this->hasMany(Judging::class, 'image_id', 'id');
    }

    public function myJudging()
    {
        return $this->hasOne(Judging::class, 'image_id', 'id')->where('user_id', auth()->id());
    }
}
