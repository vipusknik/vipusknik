<?php

function translate($word, $conjugation = 'i', $number = 's', $ucFirst = false)
{
    return \Translator::get($word, $conjugation, $number, $ucFirst);
}

function get_id($item)
{
    return is_object($item) ? $item->id : $id = $item;
}

function years($years)
{
    return conjugate_by_number($years, 'год', 'года', 'лет', 'лет');
}

function conjugate_by_number($number, $one, $twoToFour, $elevenToNineteen, $default)
{
    if ($number >= 11 && $number <= 19) return $elevenToNineteen;

    $number = $number % 10;

    if ($number == 1) return $one;

    if ($number >= 2 && $number <= 4) return $twoToFour;

    return $default;
}
