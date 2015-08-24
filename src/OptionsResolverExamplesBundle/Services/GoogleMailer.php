<?php
namespace OptionsResolverExamplesBundle\Services;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Options;

class GoogleMailer extends Mailer
{
    private $to;
    private $requiredOptions;

    public function __construct($options)
    {
        parent::__construct($options);

        $this->setTo($this->options['to']);
    }

    /**
     * Overriding the default configuration
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'host' => 'smtp.google.com',
        ));

        // Added new constraint, required options
        $resolver->setRequired('to');

        if ($resolver->isRequired('to')) {
            $this->requiredOptions = $resolver->getRequiredOptions();
        }

        // Type validation
//        $resolver->setAllowedTypes('port', 'int');


        // Value validation
//        $resolver->setDefault('transport', 'mail');
//        $resolver->setAllowedValues('transport', array('mail', 'smtp'));
//        $resolver->addAllowedValues('transport', 'sendmail');


        // Normalization
//         $resolver->setNormalizer('host', function ($options, $value) {
//            if ('http://' !== substr($value, 0, 7)) {
//                if ($options['to'] == 'radu') {
//                  $value = 'https://'.$value;
//                } else {
//                  $value = 'http://'.$value;
//                }
//
//            }
//
//            return $value;
//        });
//

        // Default values that depend on another option
        $resolver->setDefault('encryption', null);

        $resolver->setDefault('port', function (Options $options) {
            if ('ssl' === $options['encryption']) {
                return 465;
            }

            return 25;
        });
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function send()
    {
        var_dump("message sent to " . $this->options['to']);
        var_dump($this->options);
    }

    public function getRequiredOptions()
    {
        var_dump($this->requiredOptions);
    }
}
