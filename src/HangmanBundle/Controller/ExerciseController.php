<?php

namespace HangmanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ExerciseController extends Controller
{
    /**
     * @Route("/twig")
     * @Template()
     */
    public function indexAction()
    {
        $user1 = new \StdClass();
        $user1->name      = 'Jane';
        $user1->lastname  = 'Williams';
        $user1->biography = '<strong>Lorem</strong> ipsum <em>dolor</em>.';
        $user1->age       = 45;
        $user1->friends   = array();

        $user2 = array(
            'name'      => 'John',
            'lastname'  => 'Smith',
            'biography' => '<h2>Sit amet</h2> dolorem ipsum.',
            'age'       => 17,
            'friends'   => array(
                $user1,
                array('name' => 'Michael', 'lastname' => 'Brown',  'age' => 16),
                array('name' => 'Robert',  'lastname' => 'Miller', 'age' => 27),
            ),
        );

        $order = array(
            'totalWithoutTaxes' => 19.99,
            'taxRate'           => 0.20,
            'paymentMethod'     => 'credit_card',
            'creditCardNumber'  => '4400221234567890',
        );

        return array(
            'user1' => $user1,
            'user2' => $user2,
            'order' => $order,
        );
    }
}