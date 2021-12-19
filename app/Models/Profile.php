<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'bio',
        'url',
        'profile_picture_caption',
        'profile_picture'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
