<?php

declare(strict_types=1);

namespace BackEndTea\Advent;

use BackEndTea\Advent\Day\Day;
use function file_get_contents;

final class DayRunner
{
    /**
     * @param array<Day> $days
     */
    public static function runDays(array $days): void
    {
        foreach ($days as $day) {
            self::runDay($day);
        }
    }

    public static function runDay(Day $day): void
    {
        echo '===== Answering day ' . $day->number() . ' =====';
        echo "\n";
        echo 'Answer to challenge one: ';
        echo $day->solveChallengeOne(file_get_contents($day->getChallengeOneFile()));
        echo "\n\n";
        echo 'Answer to challenge two: ';
        echo $day->solveChallengeTwo(file_get_contents($day->getChallengeTwoFile()));
        echo "\n\n";
    }
}
