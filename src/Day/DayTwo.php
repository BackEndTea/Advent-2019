<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day;

use BackEndTea\Advent\Str;
use function count;
use function implode;
use function strpos;

/**
 * @psalm-immutable
 */
final class DayTwo implements Day
{
    public function solveChallengeOne(string $input): string
    {
        return $this->solve(Str::turnIntoIntegerArray($input, ','));
    }

    public function solveChallengeTwo(string $input): string
    {
        $inputArray = Str::turnIntoIntegerArray($input, ',');

        for ($i = 0; $i < 100; $i++) {
            for ($j = 0; $j < 100; $j++) {
                $new = $inputArray;
                $new[1] = $i;
                $new[2] = $j;

                $out = $this->solve($new);
                if (strpos($out, '19690720') === 0) {
                    return (string) ($new[1] * 100 + $new[2]);
                }
            }
        }

        return 'no solution';
    }

    /**
     * @param array<int> $inputArray
     */
    private function solve(array $inputArray): string
    {
        $count = count($inputArray);
        for ($i = 0; $i < $count; $i++) {
            $code = $inputArray[$i];
            if ($code === 99) {
                break;
            }
            if ($code === 1) {
                [$keyOne, $keyTwo, $writeTo] = $this->getInstructionKeysForOpCode($i, $inputArray);
                $inputArray[$writeTo] = $inputArray[$keyOne] + $inputArray[$keyTwo];
                $i +=3;
                continue;
            }

            if ($code === 2) {
                [$keyOne, $keyTwo, $writeTo] = $this->getInstructionKeysForOpCode($i, $inputArray);
                $inputArray[$writeTo] = $inputArray[$keyOne] * $inputArray[$keyTwo];
                $i +=3;
                continue;
            }
        }

        return implode(',', $inputArray);
    }

    /**
     * @param array<int> $input
     *
     * @return array<int>
     *
     * @psalm-return array{0: int, 1: int, 2: int}
     */
    private function getInstructionKeysForOpCode(int $index, array $input): array
    {
        return [$input[$index + 1], $input[$index + 2],$input[$index + 3]];
    }

    public function getChallengeOneFile(): string
    {
        return __DIR__ . '/../../resources/dayTwo/1.txt';
    }

    public function getChallengeTwoFile(): string
    {
        return __DIR__ . '/../../resources/dayTwo/2.txt';
    }

    public function number(): string
    {
        return '2';
    }
}
