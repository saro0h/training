<?php

namespace HangmanBundle\Entity;

class User
{
    private $fullname;

    private $username;

    public function __construct($fullname, $username)
    {
        $this->fullname = $fullname;
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }


}