<?php

namespace ValidatorExamplesBundle\EntitiesTwo;

use Symfony\Component\Validator\Constraints as ValidationConstraint;

abstract class AbstractUser
{
    /**
     * @ValidationConstraint\NotBlank(groups={"mygroup"})
     * @ValidationConstraint\Type(type="string", groups={"mygroup"})
     * @ValidatorExamplesBundle\CustomValidators\ChuckNorris(levelOfAwesomeness=5, groups={"mygroup"})
     */
    private $firstName;
    
    /**
     * @ValidationConstraint\NotBlank(groups={"mygroup"})
     * @ValidationConstraint\Type(type="string", groups={"mygroup"})
     */
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
