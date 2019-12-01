<?php

declare(strict_types=1);

namespace BackEndTea\Advent;

use function str_replace;

/**
 * @psalm-immutable
 */
final class Str
{
    /**
     * @psalm-pure
     */
    public static function normalizeLines(string $input): string
    {
        return str_replace(["\r\n", "\r"], "\n", $input);
    }
}
