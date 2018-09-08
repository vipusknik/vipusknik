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
    if (! is_numeric($years)) return;

    if ($years >= 11 && $years <= 19) return 'лет';

    $years = $years % 10;

    if ($years == 1) return 'год';

    if ($years >= 2 && $years <= 4) return 'года';

    return 'лет';
}
