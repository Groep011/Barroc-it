<?php

namespace App\Classes;

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
