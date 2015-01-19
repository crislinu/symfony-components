<?php

namespace ValidatorExamplesBundle\EntitiesFive;

use Symfony\Component\Validator\Constraints as ValidationConstraint;

class MyUser
{
   /**
     * @ValidationConstraint\NotBlank(groups={"mygroup"})
     * @ValidationConstraint\Type(type="integer", groups={"mygroup"})
     */
    private $age;
    
    /**
     * @ValidationConstraint\NotNull(groups={"mygroup"})
     * @ValidationConstraint\Type(type="object", groups={"mygroup"})
     * @ValidationConstraint\DateTime(groups={"mygroup"})
     */
    private $birthdate;
    
    /**
     * @ValidationConstraint\Valid
     * @var UserContactDetails
     */
    private $contactDetails;

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }
    
    public function getContactDetails() {
        return $this->contactDetails;
    }

    public function setContactDetails(UserContactDetails $contactDetails) {
        $this->contactDetails = $contactDetails;
    }
}
