<?php
class Employee {

    private $etc;
    private $birthPlace;
    private $passportData;
    private $address;
    private $wage;
    private $weight;
    private $birthDate;
    private $fullName;
    private $height;

    public function __construct(
            $fullName, $birthDate, $weight,
            $height, $wage, $address, 
            $passportData, $birthPlace, $etc)
    {
                $this->fullName = $fullName;
                $this->birthDate = $birthDate;
                $this->weight = $weight;
                $this->height = $height;
                $this->wage = $wage;
                $this->address = $address;
                $this->passportData = $passportData;
                $this->birthPlace = $birthPlace;
                $this->etc = $etc;
    }
    function getEtc() {
        return $this->etc;
    }

    function getBirthPlace() {
        return $this->birthPlace;
    }

    function getPassportData() {
        return $this->passportData;
    }

    function getAddress() {
        return $this->address;
    }

    function getWage() {
        return $this->wage;
    }

    function getWeight() {
        return $this->weight;
    }

    function getBirthDate() {
        return $this->birthDate;
    }

    /**
     * 
     * @return String
     */
    function getFullName() {
        return $this->fullName;
    }

    function getHeight() {
        return $this->height;
    }


}