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