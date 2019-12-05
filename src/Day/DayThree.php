<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day;

use BackEndTea\Advent\Day\DayThree\Matrix;
use BackEndTea\Advent\Str;
use function explode;

/**
 * @psalm-external-mutation-free
 */
final class DayThree implements Day
{
    public function solveChallengeOne(string $input): string
    {
        [$wireOne, $wireTwo] = $this->getWiresFromInput($input);

        return (new Matrix($wireOne, $wireTwo))->solve();
    }

    public function solveChallengeTwo(string $input): string
    {
        [$wireOne, $wireTwo] = $this->getWiresFromInput($input);

        return (new Matrix($wireOne, $wireTwo))->solveTwo();
    }

    /**
     * @return array<array<string>>
     *
     * @psalm-return array{0:array<string>, 1: array<string>}
     */
    private function getWiresFromInput(string $input): array
    {
        $input = Str::normalizeLines($input);
        $wires = explode("\n", $input);
        [$wireOne, $wireTwo] = $wires;
        $wireOne = explode(',', $wireOne);
        $wireTwo = explode(',', $wireTwo);

        return [$wireOne, $wireTwo];
    }

    public function getChallengeOneFile(): string
    {
        return __DIR__ . '/../../resources/dayThree/1.txt';
    }

    public function getChallengeTwoFile(): string
    {
        return __DIR__ . '/../../resources/dayThree/1.txt';
    }

    public function number(): string
    {
        return '3';
    }
}
