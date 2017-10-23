<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Custormer extends Model
{
    public function projects() {
        return $this->hasMany('\App\model\Project');
    }
}
