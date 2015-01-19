<?php

namespace ValidatorExamplesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

use ValidatorExamplesBundle\EntitiesOne\MyUser as MyUserOne;
use ValidatorExamplesBundle\EntitiesTwo\MyUser as MyUserTwo;
use ValidatorExamplesBundle\EntitiesThree\MyUser as MyUserThree;
use Acme\DemoBundle\EntitiesFive\MyUser as MyUserFive;
use Acme\DemoBundle\EntitiesFive\UserContactDetails;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Email;

class WelcomeController extends Controller
{
    /**
     * tests validator functionality on an object by using a Resources\config\validation.yml file
     */
    public function indexOneAction()
    {
        $validator = $this->get('validator');
        
        $entity = new MyUserOne();
        $entity->setFirstName('john');
        $entity->setLastName('doe');
        $entity->addAlias('ghita');
        $entity->addAlias('dj vasile');
        $entity->addAlias(12345);
        $entity->setEmail('ceva@altceva');
        $entity->setBirthdate(new \DateTime());
        
        //this will use the Resources\config\validation.yml file ;)
        $errors = $validator->validate($entity, null, array('mygroup'));
        
        if (count($errors) > 0) {
            
            //Uses a __toString method on the $errors variable which is a ConstraintViolationList object.
            //This gives us a nice string for debugging
            $errorsString = '<pre>' . (string) $errors . '</pre>';

            return new Response($errorsString, Response::HTTP_BAD_REQUEST);
        }
        
        return new Response('everything ok yeey', Response::HTTP_OK);
    }
    
    /**
     * tests validator functionality on an object by using the annotations declared on the properties of that object
     * PS: make sure you enable validator's annotations in the framework configuration settings
     * also, new concept: validation of getters (methods that start with "get", "is" or "has")
     */
    public function indexTwoAction()
    {
        $validator = $this->get('validator');
        
        $entity = new MyUserTwo();
        $entity->setFirstName('john');
        $entity->setLastName('doe');
        $entity->setAge(123);
        $entity->addAlias('ghita');
        $entity->addAlias('dj vasile');
        $entity->setEmail('ceva@subdomain.domain.tld');
        $entity->setBirthdate(new \DateTime());
        
        //this will use the annotations found within the object ;)
        $errors = $validator->validate($entity, null, array('mygroup'));
        
        if (count($errors) > 0) {
            
            //Uses a __toString method on the $errors variable which is a ConstraintViolationList object.
            //This gives us a nice string for debugging
            $errorsString = '<pre>' . (string) $errors . '</pre>';

            return new Response($errorsString, Response::HTTP_BAD_REQUEST);
        }
        
        return new Response('everything ok yeey', Response::HTTP_OK);
    }
    
    /**
     * tests validator functionality on an object by using Validator's static metadata loader
     * also, new concept: custom constraint validators
     */
    public function indexThreeAction()
    {
        $validator = $this->get('validator');
        
        $entity = new MyUserThree();
        $entity->setFirstName('john');
        $entity->setLastName(56454);
        $entity->addAlias('ghita');
        $entity->addAlias('dj vasile');
        $entity->setEmail('ceva@altceva.subdomain.tld');
        $entity->setBirthdate(new \DateTime());
        
        //this will use the loadValidatorMetadata() method found within the object ;)
        $errors = $validator->validate($entity, null, array('mygroup'));
        
        if (count($errors) > 0) {
            
            //Uses a __toString method on the $errors variable which is a ConstraintViolationList object.
            //This gives us a nice string for debugging
            $errorsString = '<pre>' . (string) $errors . '</pre>';

            return new Response($errorsString, Response::HTTP_BAD_REQUEST);
        }
        
        return new Response('everything ok yeey', Response::HTTP_OK);
    }
    
    /**
     * tests validator functionality on single values (before assigning them to object)
     */
    public function indexFourAction()
    {
        $validator = $this->get('validator');
        
        $entity = new MyUserThree();
        
        $notBlank = new NotBlank();
        $notNull = new NotNull();
        $email = new Email(array('checkMX' => false, 'strict' => false));
        
        $errors1 = $validator->validate('john', $notBlank);
        if (count($errors1) == 0) {
            $entity->setFirstName('john');
        } else {
            $errorsString = '<pre>' . (string) $errors1 . '</pre>';
            return new Response($errorsString, Response::HTTP_BAD_REQUEST);
        }
        
        $errors2 = $validator->validate('doe', $notBlank);
        if (count($errors2) == 0) {
            $entity->setLastName('doe');
        } else {
            $errorsString = '<pre>' . (string) $errors2 . '</pre>';
            return new Response($errorsString, Response::HTTP_BAD_REQUEST);
        }
        
        $errors3 = $validator->validate('ceva@ceva-dot-com', array($notBlank, $email));
        if (count($errors3) == 0) {
            $entity->setEmail('ceva@ceva-dot-com');
        } else {
            $errorsString = '<pre>' . (string) $errors3 . '</pre>';
            return new Response($errorsString, Response::HTTP_BAD_REQUEST);
        }
        
        $now = new \DateTime();
        $errors4 = $validator->validate($now, $notNull);
        if (count($errors4) == 0) {
            $entity->setBirthdate($now);
        } else {
            $errorsString = '<pre>' . (string) $errors4 . '</pre>';
            return new Response($errorsString, Response::HTTP_BAD_REQUEST);
        }
        
        return new Response('everything ok yeey', Response::HTTP_OK);
    }
    
    /**
     * tests validator functionality on an object that contains another object (the special "Valid" constraint)
     */
    public function indexFiveAction()
    {
        $validator = $this->get('validator');
        
        $entity = new MyUserFive();
        $entity->setAge(123);
        $entity->setBirthdate(new \DateTime());
        
        $contactDetails = new UserContactDetails();
        $contactDetails->setEmail('ceva@something');
        $contactDetails->setWebsite('this-should-be-a-website-but-it-is-not');
        
        $entity->setContactDetails($contactDetails);
        
        //this will use the annotations found within the object ;)
        $errors = $validator->validate($entity, null, array('mygroup'));
        
        if (count($errors) > 0) {
            
            //Uses a __toString method on the $errors variable which is a ConstraintViolationList object.
            //This gives us a nice string for debugging
            $errorsString = '<pre>' . (string) $errors . '</pre>';

            return new Response($errorsString, Response::HTTP_BAD_REQUEST);
        }
        
        return new Response('everything ok yeey', Response::HTTP_OK);
    }
}
