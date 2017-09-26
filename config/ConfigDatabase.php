<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 26-9-2017
 * Time: 09:29
 */

namespace Groep11;


class ConfigDatabase
{
    private $user;
    private $password;
    private $host;
    private $name;

    function fillLocalhost()
    {
        $this->user = "root";
        $this->password = "";
        $this->host = "localhost";
        $this->name = "";
    }

    function fillServer()
    {
        $this->user = "";
        $this->password = "";
        $this->host = "";
        $this->name = "";
    }

    function fillData()
    {
        if (!isset($this->user) && !isset($this->password) && !isset($this->host) && !isset($this->name))
        {
            $this->fillLocalhost();
            $this->fillData();
        }
        else
        {
            return array($this->user,$this->password,$this->host,$this->name);
        }
        return 0;
    }
}