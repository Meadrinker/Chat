<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction() {
        $user = $this->get('session')->get('user');
        if ($user === null) {
            return $this->redirectToRoute('user');
        }
        return $this->render('AppBundle:default:index.html.twig', array(
        ));
    }
}
