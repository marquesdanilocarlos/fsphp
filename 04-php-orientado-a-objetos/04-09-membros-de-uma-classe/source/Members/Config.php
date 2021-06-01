<?php


namespace Source\Members;


class Config
{
    public const COMPANY = "Upinside";
    protected const DOMAIN = "upiside.com.br";
    private const SECTOR = "Educação";

    private static $company;
    private static $domain;
    private static $sector;


    public static function setConfig(string $company, string $domain, string $sector)
    {
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }

}
