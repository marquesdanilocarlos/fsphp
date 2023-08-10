<?php

namespace Source\Members;

class Trigger
{
    private const TRIGGER = "trigger";
    public const ACCEPT = "accept";
    public const WARNING = "warning";
    public const ERROR = "error";

    private static string $message;
    private static ?string $errorType;
    private static string $error;

    public static function show(string $message, ?string $errorType = null)
    {
        self::setError($message, $errorType);
        echo self::$error;
    }

    public static function push($message, ?string $errorType = null) : string
    {
        self::setError($message, $errorType);
        return self::$error;
    }

    private static function setError(string $message, ?string $errorType)
    {
        $reflection = new \ReflectionClass(self::class);
        $errorTypes = $reflection->getConstants();

        self::$message = $message;
        self::$errorType = !empty($errorType) || in_array($errorType, $errorTypes)
            ? " {$errorType}"
            : "";
        self::$error = "<p class='" . self::TRIGGER . self::$errorType . "'>" . self::$message . "</p>";
    }
}