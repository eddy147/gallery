<?php

namespace Indydutch\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $categories = $this->getDoctrine()
            ->getRepository('IndydutchImageBundle:Category')
            ->findAll();

        return $this->render(
            'IndydutchImageBundle:Default:index.html.twig',
            array(
                'categories' => $categories
            )
        );
    }
}
