<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day\DayFour;

use function strlen;

/**
 * @psalm-pure
 */
final class IsSixLongRule implements Rule
{
    /**
     * @psalm-pure
     */
    public function isCorrect(string $in): bool
    {
        return strlen($in) === 6;
    }
}
