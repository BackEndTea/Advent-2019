<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Test;

use BackEndTea\Advent\Day\Day;
use Generator;
use PHPUnit\Framework\TestCase;

abstract class DayTestCase extends TestCase
{
    abstract protected function getDay(): Day;

    abstract public function provideChallengeOneCases(): Generator;

    abstract public function provideChallengeTwoCases(): Generator;

    /**
     * @dataProvider provideChallengeOneCases
     */
    final public function testItSolvesChallengeOne(string $input, string $output): void
    {
        $day = $this->getDay();
        $this->assertSame($day->solveChallengeOne($input), $output);
    }

    /**
     * @dataProvider provideChallengeTwoCases
     */
    final public function testItSolvesChallengeTwo(string $input, string $output): void
    {
        $day = $this->getDay();
        $this->assertSame($day->solveChallengeTwo($input), $output);
    }
}
