<?php

namespace Source\Members;

class Config
{
    public const COMPANY = "Upinside";
    protected const DOMAIN = "upinside.com.br";

    private const SECTOR = "Educação";

    public static string $company;
    public static string $domain;
    public static string $sector;

    public static function setConfig(string $company, string $domain, string $sector) {
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }
}