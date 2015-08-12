<?php
namespace OptionsResolverExamplesBundle\Services;

class OptionsResolverService
{
    /**
     * @param array $options
     * @return ClassicMailer
     */
    public function doClassicMailer($options)
    {
        $mailer = new ClassicMailer($options);
        $mailer->send();

        return $mailer;
    }

    /**
     *
     * @param type $options
     * @return Mailer
     */
    public function doOptionsResolverMailer($options)
    {
        $mailer = new Mailer($options);
        $mailer->send();

        return $mailer;
    }

    /**
     *
     * @param type $options
     * @return GoogleMailer
     */
    public function doGoogleMailer($options)
    {
        $mailer = new GoogleMailer($options);
        $mailer->send();

        return $mailer;
    }

    public function getRequiredOptionsForGoolgeMailer($options)
    {
        $mailer = new GoogleMailer($options);
        $mailer->getRequiredOptions();

        return $mailer;
    }
}
