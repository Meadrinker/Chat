<?php

namespace AppBundle\Controller;

use AppBundle\Service\Exception\UserNotFoundException;
use AppBundle\Service\Exception\WrongMessageException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller {

    /**
     * @Route("/chat/data", name="chat_data")
     */
    public function dataAction(Request $request) {
        $this->get('session')->save();
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
        $user = $this->get('session')->get('user');
        $message = $request->get('message');
        $responseCode = 200;
        $responseMessage = [];
        try {
            $this->get('chat_service')->addChatData($user, $message);
        } catch (UserNotFoundException $exception) {
            $responseMessage['status'] = $exception->getCode();
            $responseCode = 400;
        } catch (WrongMessageException $exception) {
            $responseMessage['status'] = $exception->getCode();
            $responseMessage['message'] = $exception->getMessage();
            $responseCode = 400;
        }

        $response = new Response(json_encode($responseMessage), $responseCode);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}