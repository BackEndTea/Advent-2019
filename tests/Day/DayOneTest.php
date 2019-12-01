<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Test\Day;

use BackEndTea\Advent\Day\Day;
use BackEndTea\Advent\Day\DayOne;
use BackEndTea\Advent\Test\DayTestCase;
use Generator;

final class DayOneTest extends DayTestCase
{
    public function getDay(): Day
    {
        return new DayOne();
    }

    public function provideChallengeOneCases(): Generator
    {
        yield ['12', '2'];
        yield ["12\n12", '4'];
        yield [file_get_contents((new DayOne())->getChallengeOneFile()), '3349352'];
    }

    public function provideChallengeTwoCases(): Generator
    {
        yield ['1969', '966'];
        yield ["1969\n1969", '1932'];
        yield [file_get_contents((new DayOne())->getChallengeOneFile()), '5021154'];
    }
}
