<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    private $id_project;
    private $klant_nr;
    private $dept;
    private $ongoing;
    private $note;
    private $done;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


}
