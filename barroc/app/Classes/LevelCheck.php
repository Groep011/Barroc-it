<?php 

namespace App\Classes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use \Illuminate\Routing\Redirector;

class LevelCheck
{

    public static function Check($rank)
    {
        if (Auth::user() != NULL)
        {
            if (Auth::user()->rank = $rank)
            {
                return true;;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

}