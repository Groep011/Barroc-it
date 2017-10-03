<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class Registratie extends Model
{
    private $rank;
    private $username;
    private $password;
    private $email;

    Public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function meneger()
    {}

    private function validator()
    {}

    private function sendEmail()
    {}

    private function setDatabase()
    {}
}
