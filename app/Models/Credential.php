<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['driver','param1','param2'])]
class Credential extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
}
