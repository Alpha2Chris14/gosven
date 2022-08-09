<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    public function incrementReadCount() {
        $this->reads++;
        return $this->save();
    }
}
