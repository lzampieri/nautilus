<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name','design'])]
class Catalogue extends Model
{
    protected $casts = [
        'design' => 'array'
    ];

    public function owner() {
        return $this->belongsTo(User::class);
    }
    
    public function places() {
        return $this->hasMany(Place::class);
    }
}
