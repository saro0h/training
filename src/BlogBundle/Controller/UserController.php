<?php

namespace BlogBundle\Controller;

use HangmanBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/user/new", name="user_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('user', $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $encoder = $this->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($encoded);

            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return array('form' => $form->createView());
    }


    /**
     * @Route("/user/success/{id}", name="user_show")
     * @Template()
     */
    public function successAction($id)
    {
        $user = $this->getDoctrine()->getRepository('HangmanBundle:User')->findOneById($id);

        return array('user' => $user);
    }

    /**
     * @Route("/users", name="user_list")
     * @Template()
     */
    public function listAction()
    {
        $users = $this->getDoctrine()->getRepository('HangmanBundle:User')->findAll();

        return array('users' => $users);
    }
}