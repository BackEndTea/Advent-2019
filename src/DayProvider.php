<?php

declare(strict_types=1);

namespace BackEndTea\Advent;

use BackEndTea\Advent\Day\Day;
use BackEndTea\Advent\Day\DayOne;
use LogicException;

final class DayProvider
{
    /**
     * @return Day[]
     */
    public static function provideDays(): array
    {
        return [
            new DayOne(),
        ];
    }

    public static function provideDay(int $day): Day
    {
        return self::provideDays()[$day -1] ?? self::doThrow($day);
    }

    private static function doThrow(int $day): Day
    {
        throw new LogicException('Unexpected day:' . $day);
    }
}
