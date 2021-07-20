<?php


namespace Source\Core;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class Mail
 * @package Source\Core
 */
class Mail
{
    /**
     * @var \stdClass
     */
    private \stdClass $data;

    /**
     * @var PHPMailer
     */
    private PHPMailer $mail;

    /**
     * @var Message
     */
    private Message $message;

    /**
     * Mail constructor.
     */
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->message = new Message();

        //Config
        $this->mail->isSMTP();
        $this->mail->setLanguage(CONF_MAIL_OPTION_LANG);
        $this->mail->isHTML(CONF_MAIL_OPTION_HTML);
        $this->mail->SMTPAuth = CONF_MAIL_OPTION_AUTH;
        $this->mail->SMTPSecure = CONF_MAIL_OPTION_SECURE;
        $this->mail->CharSet = CONF_MAIL_OPTION_CHARSET;

        //Auth
        $this->mail->Host = CONF_MAIL_HOST;
        $this->mail->Port = CONF_MAIL_PORT;
        $this->mail->Username = CONF_MAIL_USER;
        $this->mail->Password = CONF_MAIL_PASS;

    }

    public function bootstrap(string $subject, string $message, string $toEmail, string $toName): self
    {
        $this->data = new \stdClass();
        $this->data->subject = $subject;
        $this->data->message = $message;
        $this->data->toEmail = $toEmail;
        $this->data->toName = $toName;

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

    public function attach(string $filePath, string $fileName): self
    {
        $this->data->attach["$filePath"] = $fileName;
        return $this;
    }

    public function send(string $fromEmail = CONF_MAIL_SENDER["address"], string $fromName = CONF_MAIL_SENDER["name"]): bool
    {
        if (empty($this->data)) {
            $this->message->error("Erro ao enviar, favor, verifique os dados.");
            return false;
        }

        if (!isEmail($this->data->toEmail)) {
            $this->message->warning("Erro ao enviar, o e-mail de destino é inválido.");
            return false;
        }

        if (!isEmail($fromEmail)) {
            $this->message->warning("Erro ao enviar, o e-mail de remetente é inválido.");
            return false;
        }

        try {
            $this->mail->Subject = $this->data->subject;
            $this->mail->msgHTML($this->data->message);
            $this->mail->addAddress($this->data->toEmail, $this->data->toName);
            $this->mail->setFrom($fromEmail, $fromName);

            if ($attachedFiles = $this->data->attach) {
                foreach ($attachedFiles as $path => $name) {
                    $this->mail->addAttachment($path, $name);
                }
            }

            $this->mail->send();

            return true;

        } catch (Exception $e) {
            $this->message->error($e->getMessage());
            return false;
        }

    }
}
