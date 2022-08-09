<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payonline extends Model
{
    public function product()
    {
        return $this->hasOne(User::class);
    }
}
