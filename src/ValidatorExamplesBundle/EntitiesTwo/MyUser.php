<?php

namespace ValidatorExamplesBundle\EntitiesTwo;

use Symfony\Component\Validator\Constraints as ValidationConstraint;

class MyUser extends AbstractUser
{
   /**
     * @ValidationConstraint\NotBlank(groups={"mygroup"})
     * @ValidationConstraint\Type(type="integer", groups={"mygroup"})
     */
    private $age;
    
    /**
     * @ValidationConstraint\NotBlank(groups={"mygroup"})
     * @ValidationConstraint\Type(type="string", groups={"mygroup"})
     * @ValidationConstraint\Email(checkMX=false, strict=false, groups={"mygroup"})
     */
    private $email;
    
    /**
     * @ValidationConstraint\NotNull(groups={"mygroup"})
     * @ValidationConstraint\Type(type="object", groups={"mygroup"})
     * @ValidationConstraint\DateTime(groups={"mygroup"})
     */
    private $birthdate;
    
    /**
     * @ValidationConstraint\NotBlank(groups={"mygroup"})
     * @ValidationConstraint\Type(type="array", groups={"mygroup"})
     * @ValidationConstraint\All({
     *     @ValidationConstraint\NotBlank(groups={"mygroup"}),
     *     @ValidationConstraint\Type(type="string", groups={"mygroup"}),
     *     @ValidationConstraint\Length(min=3, groups={"mygroup"})
     * })
     */
    private $aliases;
    
    /**
     * @ValidationConstraint\True(groups={"mygroup"}, message="Unfortunately the user is not interesting, buy him a funny hat")
     */
    public function isInteresting()
    {
        return false;
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
