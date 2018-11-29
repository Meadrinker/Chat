<?php

namespace AppBundle\Service;

class ValidatorService {

    public function messageValidation($message) {
        $message = trim($message);
        if (strlen($message) > 0) {
            return true;
        }
        return false;
    }



}