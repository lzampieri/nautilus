<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name','note','lat','lon','visited'])]
class Place extends Model
{
    public function catalogue() {
        return $this->belongsTo(Catalogue::class);
    }
}
