<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day;

use BackEndTea\Advent\Day\DayFour\ChainRule;
use BackEndTea\Advent\Day\DayFour\HasDoubleWithoutTriple;
use BackEndTea\Advent\Day\DayFour\HasTwoSameRule;
use BackEndTea\Advent\Day\DayFour\IsNonDecreasing;
use BackEndTea\Advent\Day\DayFour\IsSixLongRule;
use BackEndTea\Advent\Day\DayFour\Rule;
use function array_reduce;
use function explode;
use function range;

/**
 * @psalm-external-mutation-free
 */
final class DayFour implements Day
{
    public function solveChallengeOne(string $input): string
    {
        $rule = new ChainRule([
            new HasTwoSameRule(),
            new IsNonDecreasing(),
            new IsSixLongRule(),
        ]);
        [$start, $end] = explode('-', $input);

        return (string) $this->getAmmountWithRangeForRules(range((int) $start, (int) $end), $rule);
    }

    public function solveChallengeTwo(string $input): string
    {
        $rule = new ChainRule([
            new HasTwoSameRule(),
            new IsNonDecreasing(),
            new IsSixLongRule(),
            new HasDoubleWithoutTriple(),
        ]);
        [$start, $end] = explode('-', $input);

        return (string) $this->getAmmountWithRangeForRules(range((int) $start, (int) $end), $rule);
    }

    /**
     * @param array<int> $range
     */
    public function getAmmountWithRangeForRules(array $range, Rule $rule): int
    {
        return array_reduce($range, static function (int $carry, int $input) use ($rule): int {
            return $carry + ($rule->isCorrect((string) $input) ? 1 : 0);
        }, 0);
    }

    public function getChallengeOneFile(): string
    {
        return __DIR__ . '/../../resources/dayFour/1.txt';
    }

    public function getChallengeTwoFile(): string
    {
        return __DIR__ . '/../../resources/dayFour/1.txt';
    }

    public function number(): string
    {
        return '4';
    }
}
