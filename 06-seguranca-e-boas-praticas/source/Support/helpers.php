<?php
/**
 * ####################
 * ###   VALIDATE   ###
 * ####################
 */

use Source\Core\Connection;
use Source\Core\Message;
use Source\Core\Session;
use Source\Model\User;

/**
 * @param string $email
 * @return bool
 */
function isEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param string $password
 * @return bool
 */
function isPassword(string $password): bool
{
    return mb_strlen($password) >= CONF_PASS_MIN_LENGTH && mb_strlen($password) <= CONF_PASS_MAX_LENGTH;
}


/**
 * ##################
 * ###   STRING   ###
 * ##################
 */

/**
 * @param string $slug
 * @return string
 */
function strSlug(string $string): string
{
    $slug = strip_tags($string);
    $slug = preg_replace('~[^\pL\d]+~u', '-', $slug);
    $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
    $slug = preg_replace('~[^-\w]+~', '', $slug);
    $slug = trim($slug, '-');
    $slug = preg_replace('~-+~', '-', $slug);
    $slug = strtolower($slug);

    if (empty($slug)) {
        return '';
    }

    return $slug;
}

/**
 * @param string $string
 * @return string
 */
function strStudlyCase(string $string): string
{
    $studlyCase = strSlug($string);
    return str_replace(
        ' ',
        '',
        mb_convert_case(
            str_replace('-', ' ', $studlyCase),
            MB_CASE_TITLE
        )
    );
}

/**
 * @param string $string
 * @return string
 */
function strCamelCase(string $string): string
{
    return lcfirst(strStudlyCase($string));
}

/**
 * @param string $string
 * @return string
 */
function strTitle(string $string): string
{
    $string = filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return mb_convert_case($string, MB_CASE_TITLE);
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function strLimitWords(string $string, int $limit, string $pointer = '...'): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);

    if ($numWords < $limit) {
        return $string;
    }

    $words = implode(" ", array_slice($arrWords, 0, $limit));

    return "{$words} {$pointer}";
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function strLimitChars(string $string, int $limit, string $pointer = '...'): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    if (mb_strlen($string) < $limit) {
        return $string;
    }

    $string = mb_substr($string, 0, $limit);
    $chars = mb_strrpos($string, " ");
    $string = mb_substr($string, 0, $chars);

    return "{$string} {$pointer}";
}

/**
 * ###############
 * ###   URL   ###
 * ###############
 */

/**
 * @param string $path
 * @return string
 */
function url(string $path): string
{
    $path = $path[0] === '/' ? mb_substr($path, 1) : $path;
    return CONF_URL_BASE . '/' . $path;
}

/**
 * @param string $url
 * @return void
 */
function redirect(string $url): void
{
    header('HTTP/1.1 302 Redirect');
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }

    $location = url($url);
    header("Location: {$location}");
    exit;
}


/**
 * ###############
 * ###   CORE   ###
 * ###############
 */

/**
 * @return PDO
 */
function db(): PDO
{
    return Connection::getInstance();
}

function message(): Message
{
    return new Message();
}

function session(): Session
{
    return new Session();
}


/**
 * ###############
 * ###  MODEL  ###
 * ###############
 */
function user(): User
{
    return new User();
}


/**
 * ##################
 * ###  PASSWORD  ###
 * ##################
 */

/**
 * @param string $password
 * @return string
 */
function passwd(string $password): string
{
    return password_hash($password, CONF_PASS_ALGO, CONF_PASS_OPTION);
}

/**
 * @param string $password
 * @param string $hash
 * @return bool
 */
function passwdVerify(string $password, string $hash): bool
{
    return password_verify($password, $hash);
}

/**
 * @param string $hash
 * @return bool
 */
function passwdRehash(string $hash): bool
{
    return password_needs_rehash($hash, CONF_PASS_ALGO, CONF_PASS_OPTION);
}

function csrfInput(): string
{
    session()->csrf();
    $token = session()->csrf_token ?? '';
    return "<input type='text' name='csrf_token' value='{$token}'/>";
}

function csrfVerify(array $request): bool
{
    $sessionToken = session()->csrf_token;
    $requestToken = $request['csrf_token'];

    if (empty($sessionToken) || empty($requestToken) || $requestToken != $sessionToken) {
        return false;
    }

    return true;
}