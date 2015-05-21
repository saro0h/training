<?php

namespace HangmanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class GameController extends Controller
{
    /**
     * @Route("/game", name="game_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/game/won", name="game_won")
     * @Template()
     */
    public function wonAction()
    {
        return array();
    }

    /**
     * @Route("/game/failed", name="game_failed")
     * @Template()
     */
    public function failedAction()
    {
        return array();
    }

    /**
     * @Route("/login", name="login")
     * @Template()
     */
    public function loginAction()
    {
        return array();
    }

    /**
     * @Template()
     */
    public function testimonialsAction()
    {
        return array(
            'testimonials' => array(
                'John Doe' => 'What an awesome game!',
                'Martin Durand' => 'More addictive than Candy Crush!',
                'Kim Kardashian' => 'Oh my gooood! Better that Kanye West\'s music!',
            )
        );
    }
}
