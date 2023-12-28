<?php
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

function strCamelCase(string $string): string
{
    return lcfirst(strStudlyCase($string));
}

function strTitle(string $string): string
{
    $string = filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return mb_convert_case($string, MB_CASE_TITLE);
}

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