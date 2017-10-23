<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function custormers() {
        return $this->belongsToMany('\App\model\Custormer');
    }
}
