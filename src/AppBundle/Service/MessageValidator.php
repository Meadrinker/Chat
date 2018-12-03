<?php

namespace AppBundle\Service;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MessageValidator {

    protected $validator;

    protected $errorMessage;

    public function __construct(ValidatorInterface $validator) {
        $this->validator = $validator;
    }

    public function errorMessage() {
        return $this->errorMessage;
    }

    public function validate($message) {
        $notBlank = new NotBlank();
        $lenght = new Length(['min' => 1, 'max' => 1000, 'minMessage' => "Nazwa musi skladac sie z przynajmniej {{ limit }} znakow",
            'maxMessage' => "Maksymalna liczba znakow w nazwie to {{ limit }}"]);
        $errors = $this->validator->validate($message, [$notBlank, $lenght]);

        if (count($errors) > 0) {
            $this->errorMessage = $errors[0]->getMessage();
            return false;
        }
        return true;
    }

}