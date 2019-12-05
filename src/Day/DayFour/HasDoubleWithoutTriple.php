<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day\DayFour;

use function str_split;

/**
 * @psalm-pure
 */
final class HasDoubleWithoutTriple implements Rule
{
    /**
     * @psalm-pure
     */
    public function isCorrect(string $in): bool
    {
        $prev = '';
        $twoPrev = '';
        foreach (str_split($in) as $i => $char) {
            if ($char === $prev
                && (
                    $char !== $twoPrev
                    && $char !== ($in[$i + 1] ?? null)
                )
            ) {
                return true;
            }

            $twoPrev = $prev;
            $prev = $char;
        }

        return false;
    }
}
