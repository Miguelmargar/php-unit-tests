<?php

/**
 *User
 *
 * A user of the system
 */

class User {
    public $first_name;
    public $surname;
    public $email;
    // For dependency injection
    protected $mailer;

    // Set the mailer dependency
    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function getFullName() {
        return trim("$this->first_name $this->surname");
    }

    public function notify($message) {

        return $this->mailer->sendMessage($this->email, $message);
    }
}