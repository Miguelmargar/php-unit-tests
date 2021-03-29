<?php

class UserStatic {
    public $email;

    protected $mailer;

    protected $mailer_callable;

    public function __construct(string $email) {
        $this->email = $email;
    }

    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function setMailerCallable($mailer) {
        $this->mailer_callable = $mailer;
    }

    // In order to make this function testable with the static method send()
    // included in the Mailer class need to refactor return statement commented out
    // to a callable
    public function notify(string $message) {
        //return $this->mailer::send($this->email, $message);
        // This is same as return statement above
        return  call_user_func($this->mailer_callable, $this->email, $message);
    }
}