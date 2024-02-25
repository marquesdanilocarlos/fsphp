<?php

namespace Source\Core;

use PHPMailer\PHPMailer\PHPMailer;
use Source\Interface\EmailInterface;

class Email implements EmailInterface
{
    private PHPMailer $mail;
    private Message $message;

    public function __construct(PHPMailer $mail, Message $message)
    {
        $this->mail = $mail;
        $this->message = $message;
        $this->configMail();
    }

    public function getMail(): PHPMailer
    {
        return $this->mail;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    private function configMail(): void
    {
        $this->mail->isSMTP();
        $this->mail->setLanguage(CONF_MAIL_OPTION_LANG);
        $this->mail->isHTML(CONF_MAIL_OPTION_HTML);
        $this->mail->SMTPAuth = CONF_MAIL_OPTION_AUTH;
        //$this->mail->SMTPSecure = CONF_MAIL_OPTION_SECURE;
        $this->mail->CharSet = CONF_MAIL_OPTION_CHARSET;
        $this->mail->Host = CONF_MAIL_HOST;
        $this->mail->Port = CONF_MAIL_PORT;
    }
}