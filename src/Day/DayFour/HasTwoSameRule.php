<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day\DayFour;

use function str_split;

/**
 * @psalm-pure
 */
final class HasTwoSameRule implements Rule
{
    /**
     * @psalm-pure
     */
    public function isCorrect(string $in): bool
    {
        $prev = '';
        foreach (str_split($in) as $char) {
            if ($char === $prev) {
                return true;
            }
            $prev = $char;
        }

        return false;
    }
}
