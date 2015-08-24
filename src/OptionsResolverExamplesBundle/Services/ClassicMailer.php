<?php
namespace OptionsResolverExamplesBundle\Services;

class ClassicMailer
{
    private $host;
    private $username;
    private $password;
    private $port;

    protected $options;

    public function __construct($options)
    {
        /* the old bad ugly way
        $this->setHost(isset($options['host'])
            ? $options['host']
            : 'localhost');

        $this->setUsername(isset($options['username'])
            ? $options['username']
            : 'jack');

        $this->setPassword(isset($options['password'])
            ? $options['password']
            : 'pa$$word');

        $this->setPort(isset($options['port'])
            ? $options['port']
            : '25');
        */

        // more likely, but you can do better
        $this->options = array_replace(array(
            'host'     => 'smtp.example.org',
            'username' => 'user',
            'password' => 'pa$$word',
            'port'     => 25,
        ), $options);

        $this->setHost($this->options['host']);
        $this->setUsername($this->options['username']);
        $this->setPassword($this->options['password']);
        $this->setPort($this->options['port']);
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
