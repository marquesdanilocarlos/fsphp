<?php

namespace Source\Core;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Source\Interface\EmailInterface;

class Email implements EmailInterface
{
    private PHPMailer $mail;
    private Message $message;

    private array $data;

    public function __construct(PHPMailer $mail, Message $message)
    {
        $this->mail = $mail;
        $this->message = $message;
        $this->data = [];
        $this->configMail();
    }

    public function bootstrap(string $subject, string $message, string $toEmail, string $toName): self
    {
        $this->data['subject'] = $subject;
        $this->data['message'] = $message;
        $this->data['toEmail'] = $toEmail;
        $this->data['toName'] = $toName;
        $this->data['attachments'] = [];

        return $this;
    }

    public function getMail(): PHPMailer
    {
        return $this->mail;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function send($fromEmail = CONF_MAIL_SENDER_EMAIL, $fromName = CONF_MAIL_SENDER_NAME): bool
    {
        if (empty($this->data)) {
            $this->message->error('Erro ao enviar, favor, verifique os dados.');
            return false;
        }

        if (!isEmail($this->data['toEmail'])) {
            $this->message->error('E-mail de destinatário inválido.');
            return false;
        }

        if (!isEmail($fromEmail)) {
            $this->message->error('E-mail de remetente inválido.');
            return false;
        }

        try {
            $this->mail->Subject = $this->data['subject'];
            $this->mail->msgHTML($this->data['message']);
            $this->mail->addAddress($this->data['toEmail'], $this->data['toName']);
            $this->mail->setFrom($fromEmail, $fromName);

            foreach ($this->data['attachments'] as $filePath => $fileName) {
                $this->mail->addAttachment($filePath, $fileName);
            }

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            $this->message->error($e->getMessage());
            return false;
        }
    }

    public function attach(string $filePath, string $fileName): self
    {
        $this->data['attachments'][$filePath] = $fileName;
        return $this;
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