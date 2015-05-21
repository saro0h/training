<?php

namespace HangmanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use HangmanBundle\Entity\User;

class StatController extends Controller
{
    /**
     * @Route("/top10", name="top10")
     */
    public function top10Action()
    {
        for ($i=0; $i<=20; $i++) {
            $arr = array('John Doe', 'Kim Kardashian', 'Kanye West', 'Fabien Potencier');
            $key = array_rand($arr);
            $username = $arr[$key].$i;
            $users[] = new User($arr[$key], $username);
        }

        return $this->render('HangmanBundle:Stat:top10.html.twig');
    }
}