<?php

namespace ValidatorExamplesBundle\EntitiesThree;

use Symfony\Component\Validator\Mapping\ClassMetadata;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

abstract class AbstractUser
{
    private $firstName;
    
    private $lastName;
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('firstName', new NotBlank(array('groups' => 'mygroup')));
        $metadata->addPropertyConstraint('firstName', new Type(array('type' => 'string', 'groups' => 'mygroup')));
        
        $metadata->addPropertyConstraint('lastName', new NotBlank(array('groups' => 'mygroup')));
        $metadata->addPropertyConstraint('lastName', new Type(array('type' => 'string', 'groups' => 'mygroup')));
    }
    
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
