<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {

    /**
     * @Route("/user", name="user")
     */
    public function userAction(Request $request) {


        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->get('user')->getData();
            $this->get('session')->set('user', $user);
            $response = new RedirectResponse('/');
            return $response->send();
        }

        return $this->render('AppBundle:user:user.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}