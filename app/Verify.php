<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Verify extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
