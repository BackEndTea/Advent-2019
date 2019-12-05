<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Test\Day;

use BackEndTea\Advent\Day\Day;
use BackEndTea\Advent\Day\DayFour;
use BackEndTea\Advent\Test\DayTestCase;
use Generator;

class DayFourTest extends DayTestCase
{
    protected function getDay(): Day
    {
        return new DayFour();
    }

    public function provideChallengeOneCases(): Generator
    {
        yield ['138241-674034', '1890'];
    }

    public function provideChallengeTwoCases(): Generator
    {
        yield ['138241-674034', '1277'];
    }
}
