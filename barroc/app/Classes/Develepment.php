<?php

namespace App\Classes;

class Develepment
{

    public function addSql($sqlList, $sqlPart)
    {
        if (isset($sqlList))
        {
            return $sqlList . "," . $sqlPart;
        }
        else
        {
            return $sqlPart;
        }
    }
}
