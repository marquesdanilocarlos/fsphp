<?php


namespace Source\App;


class Trigger
{
    private const TRIGGER = "trigger";
    public const WARNING = "warning";
    public const ERROR = "error";
    public const ACCEPT = "accept";


    private static $message;
    private static $errorType;
    private static $error;

    private static function setError(string $message, ?string $errorType)
    {
        $reflection = new \ReflectionClass(__CLASS__);
        $errorTypes = $reflection->getConstants();

        self::$message = $message;
        self::$errorType = (!empty($errorType) || in_array($errorType, $errorTypes)) ? " {$errorType}" : "";
        self::$error = "<p class='".self::TRIGGER . " " . $errorType."'>".self::$message."</p>";
    }

    public static function show(string $message, ?string $errorType = null)
    {
        self::setError($message, $errorType);
        echo self::$error;
    }

    public static function push(string $message, ?string $errorType = null)
    {
        self::setError($message, $errorType);
        return self::$error;
    }
}
