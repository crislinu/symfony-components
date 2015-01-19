<?php

namespace Acme\DemoBundle\CustomValidators;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ChuckNorrisValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof ChuckNorris) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\ChuckNorris');
        }

        if (strtolower($value) !== 'die-if-you-look-at-me-because-i-am-chuck-norris' || $constraint->levelOfAwesomeness < 0) {
            $this->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->addViolation();
        }
    }
}
