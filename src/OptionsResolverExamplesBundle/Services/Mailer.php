<?php
namespace OptionsResolverExamplesBundle\Services;

use Symfony\Component\OptionsResolver\OptionsResolver;

class Mailer
{
    private $host;
    private $username;
    private $password;
    private $port;

    protected $options;

    public function __construct($options)
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);

        $this->setHost($this->options['host']);
        $this->setUsername($this->options['username']);
        $this->setPassword($this->options['password']);
        $this->setPort($this->options['port']);
    }

    /**
     * Configuring the optionsResolver for:
     * - these 4 options will be always set (if one is missing the default value will be used)
     * - if any other option is provied, port=25 or you misspell the options, usr=jack an exception is thrown
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'host' => 'localhost',
            'username' => 'jack',
            'password' => 'pa$$word',
            'port' => '25'
        ));
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setHost($host)
    {
        $this->host = $host;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function setPort($port)
    {
        $this->port = $port;
    }

    public function send()
    {
        var_dump("message sent");
        var_dump($this->options);
    }
}
