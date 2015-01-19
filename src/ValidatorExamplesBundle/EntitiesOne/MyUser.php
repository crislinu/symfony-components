<?php

namespace ValidatorExamplesBundle\EntitiesOne;

class MyUser extends AbstractUser
{
    private $age;
    
    private $email;
    
    private $birthdate;
    
    private $aliases;
    
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
