<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable('name')]
class User extends Model implements AuthenticatableContract
{
    use SoftDeletes;
    use Authenticatable;

    public function credentials() {
        return $this->hasMany(Credential::class);
    }
}
