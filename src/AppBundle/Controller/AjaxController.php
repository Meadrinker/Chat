<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller {

    /**
     * @Route("/chat/data", name="chat_data")
     */
    public function dataAction(Request $request) {
        $id = (int) $request->get('id');
        $data = $this->get('chat_service')->getData($id);
        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/chat/send", name="chat_send")
     */
    public function sendMessageAction(Request $request) {
        $user = $request->cookies->get('user');
        $message = $request->get('message');
        $status = $this->get('chat_service')->addChatData($user, $message);
        $responseCode = 200;
        if (!$status) {
            $responseCode = 400;
        }
        $response = new Response(json_encode($status));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}