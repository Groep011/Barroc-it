<?php

namespace App\Classes;
namespace App\model\Log;

class Log
{
    private $id_user;
    private $username;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function manager($id_user, $action)
    {
        if ($action == "save")
        {
            setLogData(CheckSize(CheckPath(CheckExist(getLog()))), $string, getTime());
        }
        elseif($action == "print")
        {
            return getLogData(CheckSize(CheckPath(CheckExist(getLog()))));
        }
    }

    public function printLog()
    {

    }

    private function makeNewLog()
    {
        return $path;
    }

    private function getLog()
    {
        $path = DB::table('logs')->select('path')->where('full', 'N');        
    }

    private function setLogData($path, $string, $time)
    {

    }

    private function getTime()
    {
        return now();
    }

    private function updateLog()
    {

    }

    private function setLogFull($path)
    {

    }

    private function CheckPath($path)
    {
        if (!file_exists($path))
        {
            $path = makeNewLog();
        }

        return $path;
    }

    private function CheckSize($path)
    {
        if (filesize($path) >= 1000000)
        {
            setLogFull($path);
            $path = makeNewLog();
        }

        return $path;
    }
    
    private function CheckExist($path)
    {
        if (!isset($path))
        {
            $path = makeNewLog();
        }

        return $path;
    }
}
