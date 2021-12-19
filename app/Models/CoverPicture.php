<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverPicture extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'cover_photo_caption',
        'cover_photo'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
