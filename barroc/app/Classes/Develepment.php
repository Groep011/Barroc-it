<?php

namespace App\Classes;

class Develepment
{
    public static function addSql($sqlList, $sqlPart)
    {
        if (isset($sqlList))
        {
            return array_merge($sqlList, [$sqlPart]);
        }
        else
        {
            return [$sqlPart];
        }
    }
}
