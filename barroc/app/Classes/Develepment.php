<?php

namespace App\Classes;

class Develepment
{
    public static function addSql($sqlList, $sqlPart)
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
