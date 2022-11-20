<?php

namespace App;

class Company
{
    private string $name;
    private string $registrationCode;

    public function __construct(string $name, string $registrationCode){

        $this->name = $name;
        $this->registrationCode = $registrationCode;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getRegistrationCode(): string{
        return $this->registrationCode;
    }

}