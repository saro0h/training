<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/blog")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="blog_index")
     * @Template()
     */
    public function indexAction()
    {
        $articles = $this->getDoctrine()->getRepository('BlogBundle:Article')->findAll();

        return array('articles' => $articles);
    }

    /**
     * @Route("/new", name="blog_article_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('article', $article);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($article);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'The article has been successfully added in database.');

            $this->get('contact')->sendMail($article);

            return $this->redirectToRoute('blog_index');
        }

        return array('articleForm' => $form->createView());
    }

    /**
     * @Route("/show/{id}", name="blog_article_show")
     * @Template()
     */
    public function showAction($id)
    {
        $article = $this
            ->getDoctrine()
            ->getRepository('BlogBundle:Article')
            ->findOneById($id)
        ;

        return array('article' => $article);
    }
}
