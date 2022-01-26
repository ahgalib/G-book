<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutMe extends Model
{
    use HasFactory;
    protected $fillable = [
        'Education','skill','location','note'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
