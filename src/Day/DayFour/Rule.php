<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day\DayFour;

/**
 * @psalm-pure
 */
interface Rule
{
    /**
     * @psalm-pure
     */
    public function isCorrect(string $in): bool;
}
