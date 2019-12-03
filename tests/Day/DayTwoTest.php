<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Test\Day;

use BackEndTea\Advent\Day\Day;
use BackEndTea\Advent\Day\DayTwo;
use BackEndTea\Advent\Test\DayTestCase;
use Generator;
use function file_get_contents;

class DayTwoTest extends DayTestCase
{
    protected function getDay(): Day
    {
        return new DayTwo();
    }

    public function provideChallengeOneCases(): Generator
    {
        yield ['1,0,0,0,99', '2,0,0,0,99'];
        yield ['2,3,0,3,99', '2,3,0,6,99'];
        yield ['2,4,4,5,99,0', '2,4,4,5,99,9801'];
        yield ['1,1,1,4,99,5,6,0,99', '30,1,1,4,2,5,6,0,99'];
        yield [file_get_contents(__DIR__ . '/../../resources/dayTwo/1.txt'), '2692315,12,2,2,1,1,2,3,1,3,4,3,1,5,0,3,2,1,6,24,1,19,5,25,2,13,23,125,1,10,27,129,2,6,31,258,1,9,35,261,2,10,39,1044,1,43,9,1047,1,47,9,1050,2,10,51,4200,1,55,9,4203,1,59,5,4204,1,63,6,4206,2,6,67,8412,2,10,71,33648,1,75,5,33649,1,9,79,33652,2,83,10,134608,1,87,6,134610,1,13,91,134615,2,10,95,538460,1,99,6,538462,2,13,103,2692310,1,107,2,2692312,1,111,9,0,99,2,14,0'];
    }

    public function provideChallengeTwoCases(): Generator
    {
        yield [file_get_contents(__DIR__ . '/../../resources/dayTwo/2.txt'), '9507'];
    }
}
