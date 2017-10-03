<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    private $id_user;
    private $username;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function meneger()
    {}

    public function printLog()
    {}

    private function makeNewLog()
    {}

    private function getLog()
    {}

    private function getTime()
    {
        return now();
    }

    private function updateLog()
    {}
}
