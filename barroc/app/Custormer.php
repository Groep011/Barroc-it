<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custormer extends Model
{
    public function projects() {
        return $this->hasMany('\App\model\Project');
    }
}
