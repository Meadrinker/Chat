<?php

namespace AppBundle\Service;

use AppBundle\Entity\Chat;
use AppBundle\Service\Exception\UserNotFoundException;
use AppBundle\Service\Exception\WrongMessageException;

class ChatService {

    protected $entityManager;
    protected $validatorService;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager, MessageValidator $validatorService) {
        $this->entityManager = $entityManager;
        $this->validatorService = $validatorService;
    }

    public function getData($id) {
        if ($id === 0) {
            $data = $this->firstChatData($id);
        } else {
            $data = $this->chatData($id);
        }
        return $data;
    }

    private function firstChatData($id) {
        $lastId = 0;
        $timeStart = time();
        $timeLeft = 0;
        while ($lastId === 0 && $timeLeft <= 30) {
            $lastId = $this->entityManager->getRepository(Chat::class)->findLastId();
            if ($lastId === null) {
                $lastId = $id;
                sleep(2);
            }
            $timeLeft = time() - $timeStart;
        }

        $data = [
            'id' => $lastId,
            'messages' => [
            ]
        ];

        return $data;
    }

    private function chatData($id) {
        $selectedMessages = [];
        $timeStart = time();
        $timeLeft = 0;
        while (count($selectedMessages) === 0 && $timeLeft <= 30) {
            $selectedMessages = $this->entityManager->getRepository(Chat::class)->selectFromLastId($id);
            if (count($selectedMessages) === 0) {
                sleep(2);
            }
            $timeLeft = time() - $timeStart;
        }

        $messages = [];
        foreach ($selectedMessages as $message) {
            $messages[] = [
                'user' => $message->getUser(),
                'message' => $message->getText(),
                'date' => $message->getDate()->format('Y-m-d H:i:s')
            ];
        }
        if (count($messages) > 0) {
            $message = end($selectedMessages);
            $id = $message->getId();
        }

        $data = [
            'id' => $id,
            'messages' => $messages
        ];
        return $data;
    }

    public function addChatData($user, $message) {
        if ($user === null) {
            throw new UserNotFoundException('user not found', 1);
        }
        if (!$this->validatorService->validate($message)) {
            throw new WrongMessageException($this->validatorService->errorMessage(), 2);
        }
        $chat = new Chat();
        $chat->setUser($user);
        $chat->setText($message);
        $this->entityManager->persist($chat);
        $this->entityManager->flush();
        return true;
    }

}