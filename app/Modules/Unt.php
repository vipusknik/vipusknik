<?php

namespace App\Modules;

use Carbon\Carbon;

class Unt
{
    public static function counterText()
    {
        // Получить дату будущего ент
        $date = (new static)->date();

        // Получить кол-во месяцев до ент
        $monthsTo = $date->diffInMonths(Carbon::now());
        // если осталось больше месяца посчитать строку до ент
        if ($monthsTo > 0) {
            return 'до ЕНТ ' .
                    conjugate_by_number($monthsTo, 'остался', 'осталось', 'осталось', 'осталось') . ' ' .
                    $monthsTo . ' ' .
                    conjugate_by_number($monthsTo, 'месяц', 'месяца', 'месяцев', 'месяцев');
        }

        // иначе посчитать строку дней
        $daysTo = $date->diffInDays(Carbon::now());
        return 'до ЕНТ ' .
               conjugate_by_number($daysTo, 'остался', 'осталось', 'осталось', 'осталось') . ' ' .
               $daysTo . ' ' .
               conjugate_by_number($daysTo, 'день', 'дня', 'дней', 'дней');
    }

    public function date()
    {
        // задать дату ЕНТ на текущий год
        $date = Carbon::create(Carbon::now()->year, config('unt.month'), config('unt.day'));

        // Если ЕНТ прошло, то перенести дату на год вперед
        return Carbon::now()->greaterThan($date) ? $date->addYear() : $date;
    }
}
