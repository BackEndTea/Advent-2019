<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Test\Day;

use BackEndTea\Advent\Day\Day;
use BackEndTea\Advent\Day\DayThree;
use BackEndTea\Advent\Test\DayTestCase;
use Generator;
use function file_get_contents;

class DayThreeTest extends DayTestCase
{
    protected function getDay(): Day
    {
        return new DayThree();
    }

    public function provideChallengeOneCases(): Generator
    {
        yield ["R8,U5,L5,D3\nU7,R6,D4,L4", '6'];
        yield ["R75,D30,R83,U83,L12,D49,R71,U7,L72\nU62,R66,U55,R34,D71,R55,D58,R83", '159'];
        yield ["R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51\nU98,R91,D20,R16,D67,R40,U7,R15,U6,R7", '135'];
        yield [file_get_contents(__DIR__ . '/../../resources/dayThree/1.txt'), '3247'];
    }

    public function provideChallengeTwoCases(): Generator
    {
        yield ["R8,U5,L5,D3\nU7,R6,D4,L4", '30'];
        yield ["R75,D30,R83,U83,L12,D49,R71,U7,L72\nU62,R66,U55,R34,D71,R55,D58,R83", '610'];
        yield ["R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51\nU98,R91,D20,R16,D67,R40,U7,R15,U6,R7", '410'];
//        yield [file_get_contents(__DIR__ . '/../../resources/dayThree/1.txt'), '48054'];
    }
}
