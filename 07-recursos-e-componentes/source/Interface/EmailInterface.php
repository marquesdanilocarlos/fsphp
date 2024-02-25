<?php

namespace Source\Interface;

interface EmailInterface
{
    public function bootstrap(string $subject, string $message, string $toEmail, string $toName);

    public function getMail();

    public function getMessage();

    public function attach(string $filePath, string $fileName);

    public function send($fromEmail = CONF_MAIL_SENDER_EMAIL, $fromName = CONF_MAIL_SENDER_NAME);
}