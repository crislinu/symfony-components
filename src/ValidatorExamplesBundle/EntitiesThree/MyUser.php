<?php

namespace ValidatorExamplesBundle\EntitiesThree;

use Symfony\Component\Validator\Mapping\ClassMetadata;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Email;

class MyUser extends AbstractUser
{
    private $age;
    
    private $email;
    
    private $birthdate;
    
    private $aliases;
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('age', new NotBlank(array('groups' => 'mygroup')));
        $metadata->addPropertyConstraint('age', new Type(array('type' => 'integer', 'groups' => 'mygroup')));
        
        $metadata->addPropertyConstraint('aliases', new NotBlank(array('groups' => 'mygroup')));
        $metadata->addPropertyConstraint('aliases', new Type(array('type' => 'array', 'groups' => 'mygroup')));
        
        $metadata->addPropertyConstraint('email', new NotBlank(array('groups' => 'mygroup')));
        $metadata->addPropertyConstraint('email', new Type(array('type' => 'string', 'groups' => 'mygroup')));
        $metadata->addPropertyConstraint('email', new Email(array(
            'checkMX' => false,
            'strict' => false,
            'groups' => 'mygroup'
        )));
        
        $metadata->addPropertyConstraint('email', new NotNull(array('groups' => 'mygroup')));
        $metadata->addPropertyConstraint('birthdate', new Type(array('type' => 'object', 'groups' => 'mygroup')));
    }
    
    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function addAlias($alias)
    {
        if (! is_array($this->aliases)) {
            $this->aliases = array();
        }
        
        $this->aliases[] = $alias;
    }
    
    public function getAliases()
    {
        if (! is_array($this->aliases)) {
            return array();
        }
        
        return $this->aliases;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }
}
