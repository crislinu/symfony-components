<?php

namespace ValidatorExamplesBundle\EntitiesFive;

use Symfony\Component\Validator\Constraints as ValidationConstraint;

class UserContactDetails
{
    /**
     * @ValidationConstraint\NotBlank(groups={"mygroup"})
     * @ValidationConstraint\Type(type="string", groups={"mygroup"})
     * @ValidationConstraint\Email(checkMX=false, strict=false, groups={"mygroup"})
     */
    private $email;
    
    /**
     * @ValidationConstraint\NotBlank(groups={"mygroup"})
     * @ValidationConstraint\Type(type="string", groups={"mygroup"})
     * @ValidationConstraint\Url(groups={"mygroup"})
     */
    private $website;
    
    public function getEmail() {
        return $this->email;
    }

    public function getWebsite() {
        return $this->website;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setWebsite($website) {
        $this->website = $website;
    }
}
