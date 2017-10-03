<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class Custormer extends Model
{
    private $klant_nr;
    private $name;
    private $tel;
    private $city;
    private $street;
    private $house_nr;
    private $bank_account;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getKlantNr()
    {
        return $this->klant_nr;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getHouseNr()
    {
        return $this->house_nr;
    }

    public function getBankAccount()
    {
        return $this->bank_account;
    }
}
