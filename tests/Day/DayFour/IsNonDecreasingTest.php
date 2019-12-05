<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Test\Day\DayFour;

use BackEndTea\Advent\Day\DayFour\IsNonDecreasing;
use Generator;
use PHPUnit\Framework\TestCase;

final class IsNonDecreasingTest extends TestCase
{
    /**
     * @dataProvider provideStringCases
     */
    public function testKnowsIfCorrect(string $input, bool $expected): void
    {
        $rule = new IsNonDecreasing();
        $this->assertSame($expected, $rule->isCorrect($input));
    }

    public function provideStringCases(): Generator
    {
        yield ['1234', true];
        yield ['4321', false];
        yield ['223450', false];
        yield ['1111', true];
        yield ['0000', true];
    }
}
