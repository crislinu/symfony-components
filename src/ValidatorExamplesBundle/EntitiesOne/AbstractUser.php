<?php

namespace ValidatorExamplesBundle\EntitiesOne;

abstract class AbstractUser
{
    private $firstName;
    
    private $lastName;
    
    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
}
