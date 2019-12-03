<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day;

use BackEndTea\Advent\Str;
use function array_reduce;
use function floor;
use function max;

/**
 * @psalm-immutable
 */
final class DayOne implements Day
{
    public function solveChallengeOne(string $input): string
    {
        $inputArray = Str::turnIntoIntegerArray(Str::normalizeLines($input), "\n");

        return (string) array_reduce($inputArray, function (int $carry, int $item) {
            return $carry + $this->calculateFuelNeededForInput($item);
        }, 0);
    }

    public function solveChallengeTwo(string $input): string
    {
        $inputArray = Str::turnIntoIntegerArray(Str::normalizeLines($input), "\n");

        return (string) array_reduce($inputArray, function (int $carry, int $item) {
            return $carry +
                $this->calculateFuelNeededForInputRecursive(
                    $this->calculateFuelNeededForInput($item)
                );
        }, 0);
    }

    private function calculateFuelNeededForInputRecursive(int $input): int
    {
        if ($input === 0) {
            return 0;
        }

        return $input + $this->calculateFuelNeededForInputRecursive((int) max(floor($input / 3) - 2, 0));
    }

    private function calculateFuelNeededForInput(int $input): int
    {
        return (int) max(floor($input / 3) - 2, 0);
    }

    public function getChallengeOneFile(): string
    {
        return __DIR__ . '/../../resources/dayOne/1.txt';
    }

    public function getChallengeTwoFile(): string
    {
        return __DIR__ . '/../../resources/dayOne/1.txt';
    }

    public function number(): string
    {
        return '1';
    }
}
