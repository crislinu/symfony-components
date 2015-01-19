<?php

namespace Acme\DemoBundle\CustomValidators;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 *
 */
class ChuckNorris extends Constraint
{
    public $message = 'This value should be awesome and god-like... just like Chuck Norris.';
    
    //all constraint options should be public properties
    public $levelOfAwesomeness = 0;
    
    //this is optional.
    //give it value self::PROPERTY_CONSTRAINT if you want constraint to apply to properties and getters (default value)
    //otherwise give it value self::CLASS_CONSTRAINT if you want constraint to apply to the class itself
    public function getTargets()
    {
        return self::PROPERTY_CONSTRAINT;
    }
    
    //this is optional
    //tells you to which ConstraintValidator this Constraint belongs
    //default value is get_class($this).'Validator'
    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
}
