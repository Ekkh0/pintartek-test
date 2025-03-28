<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardioType extends Model
{
    use HasFactory;

    protected $table = 'CardioTypes';
    protected $fillable = [
        'name',
        'image',
    ];

    public function CardioEntries(){
        return $this->hasMany(CardioEntry::class);
    }
}
