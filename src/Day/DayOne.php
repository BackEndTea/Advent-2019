<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day;

use function array_filter;
use function array_map;
use function array_reduce;
use function explode;
use function floor;
use function is_numeric;
use function max;
use function str_replace;

/**
 * --- Day 1: The Tyranny of the Rocket Equation ---

Santa has become stranded at the edge of the Solar System while delivering presents to other planets! To accurately calculate his position in space, safely align his warp drive, and return to Earth in time to save Christmas, he needs you to bring him measurements from fifty stars.

Collect stars by solving puzzles. Two puzzles will be made available on each day in the Advent calendar; the second puzzle is unlocked when you complete the first. Each puzzle grants one star. Good luck!

The Elves quickly load you into a spacecraft and prepare to launch.

At the first Go / No Go poll, every Elf is Go until the Fuel Counter-Upper. They haven't determined the amount of fuel required yet.

Fuel required to launch a given module is based on its mass. Specifically, to find the fuel required for a module, take its mass, divide by three, round down, and subtract 2.
 *
 * During the second Go / No Go poll, the Elf in charge of the Rocket Equation Double-Checker stops the launch sequence. Apparently, you forgot to include additional fuel for the fuel you just added.

Fuel itself requires fuel just like a module - take its mass, divide by three, round down, and subtract 2. However, that fuel also requires fuel, and that fuel requires fuel, and so on. Any mass that would require negative fuel should instead be treated as if it requires zero fuel; the remaining mass, if any, is instead handled by wishing really hard, which has no mass and is outside the scope of this calculation.

So, for each module mass, calculate its fuel and add it to the total. Then, treat the fuel amount you just calculated as the input mass and repeat the process, continuing until a fuel requirement is zero or negative. For example:
 */
class DayOne implements Day
{
    public function solveChallengeOne(string $input): string
    {
        $inputArray = $this->convertInputStringToArrayOfNumbers($input);

        return (string) array_reduce($inputArray, function (?int $carry, int $item) {
            return $carry + $this->calculateFuelneededForInput($item);
        });
    }

    public function solveChallengeTwo(string $input): string
    {
        $inputArray = $this->convertInputStringToArrayOfNumbers($input);

        return (string) array_reduce($inputArray, function (?int $carry, int $item) {
            $fuel = 0;
            do {
                $item = $this->calculateFuelneededForInput($item);
                $fuel += $item;
            } while ($item > 0);

            return $carry + $fuel;
        });
    }

    private function calculateFuelneededForInput(int $input): int
    {
        return (int) max(floor($input / 3) - 2, 0);
    }

    /**
     * @return array<int>
     */
    private function convertInputStringToArrayOfNumbers(string $input): array
    {
        return array_filter(array_map(
            static function (string $inputNumber): ?int {
                if (! is_numeric($inputNumber)) {
                    return null;
                }

                return (int) $inputNumber;
            },
            explode("\n", str_replace(["\r", "\r\n"], "\n", $input))
        ), static function (?int $input): bool {
            return $input !== null;
        });
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
