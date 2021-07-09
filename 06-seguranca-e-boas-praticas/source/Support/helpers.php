<?php

/**
 * ######################
 * ### STRING HELPERS ###
 * ######################
 */


/**
 * @param string $string
 * @return string
 */

function strSlug(string $string): string
{
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';

    $slug = trim(strtr(utf8_decode($string), utf8_decode($formats), $replace));
    $slug = str_replace(' ', '-', $slug);
    $slug = str_replace(['-----', '----', '---', '--'], '-', $slug);

    return $slug;
}

function strStudlyCase(string $string): string
{
    $string = strSlug($string);
    $studlyCase = str_replace(
        " ",
        "",
        mb_convert_case(
            str_replace("-", " ", $string),
            MB_CASE_TITLE
        )
    );

    return $studlyCase;
}

function strCamelCase(string $string): string
{
    return lcfirst(strStudlyCase($string));
}
