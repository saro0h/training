<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="signin")
     * @Template()
     */
    public function loginAction()
    {
        $helper = $this->get('security.authentication_utils');

        $lastUsername = $helper->getLastUsername();
        $error = $helper->getLastAuthenticationError();

        return array('lastUsername' => $lastUsername, 'error' => $error);
    }

    /**
     * @Route("/blog/auth", name="login_check")
     */
    public function loginCheckAction()
    {
        // Never used!!!
    }
}