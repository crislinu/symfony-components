<?php
namespace OptionsResolverExamplesBundle\Services;

use Symfony\Component\OptionsResolver\OptionsResolver;

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
            'host' => 'smtp.google.com'
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
