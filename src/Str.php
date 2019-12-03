<?php

declare(strict_types=1);

namespace BackEndTea\Advent;

use function array_filter;
use function array_map;
use function explode;
use function is_numeric;
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

    /**
     * @return array<int>
     *
     * @psalm-pure
     */
    public static function turnIntoIntegerArray(string $input, string $explode): array
    {
        return array_filter(array_map(
            static function (string $inputNumber): ?int {
                if (! is_numeric($inputNumber)) {
                    return null;
                }

                return (int) $inputNumber;
            },
            explode($explode, $input)
        ), static function (?int $intOrNull): bool {
            return $intOrNull !== null;
        });
    }
}
