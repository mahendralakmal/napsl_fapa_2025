<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'section',
        'first_name',
        'surname',
        'telephone',
        'age',
        'grade',
        'school',
        'year_of_study',
        'registration_number',
        'membership_number'
    ];

    protected $table = 'user_profiles';

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
