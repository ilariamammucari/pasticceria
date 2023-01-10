<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dessert extends Model
{
    use HasFactory;

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public $fillable = [
        'name',
        'price'
    ];
}
