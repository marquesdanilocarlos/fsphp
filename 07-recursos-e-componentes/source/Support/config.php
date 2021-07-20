<?php

/**
 * DATABASE
 */

define("CONF_DB_HOST", "db");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "a654321");
define("CONF_DB_NAME", "fs_php");

/**
 * URLS
 */
define("CONF_URL_BASE", "http://localhost/fsphp/06-seguranca-e-boas-praticas/06-08-camada-de-manipulacao-pt3/index.php");
define("CONF_URL_ADMIN", CONF_URL_BASE . "/admin");
define("CONF_URL_ERROR", CONF_URL_BASE . "/404");


/**
 * DATES
 */
define("CONF_DATE_BR", "d/m.Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * SESSION
 */
define("CONF_SES_PATH", __DIR__."/../../storage/sessions");

/**
 * MESSAGES
 */
define("CONF_MESSAGE_CLASS", "trigger");
define("CONF_MESSAGE_INFO", "info");
define("CONF_MESSAGE_SUCCESS", "success");
define("CONF_MESSAGE_WARNING", "warning");
define("CONF_MESSAGE_ERROR", "error");


/**
 * PASSWORD
 */

define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTIONS", ["cost" => 10]);

/**
 * EMAIL
 */
define("CONF_MAIL_HOST", "smtp.sendgrid.net");
define("CONF_MAIL_PORT", 587);
define("CONF_MAIL_USER", "apikey");
define("CONF_MAIL_PASS", "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");
define("CONF_MAIL_SENDER", ["name" => "Danilo Marques", "address" => "marquesdanilocarlos@gmail.com"]);

define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");
