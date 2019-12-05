<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Test\Day\DayFour;

use BackEndTea\Advent\Day\DayFour\HasDoubleWithoutTriple;
use Generator;
use PHPUnit\Framework\TestCase;

class HasDoubleWithoutTripleTest extends TestCase
{
    /**
     * @dataProvider provideStringCases
     */
    public function testKnowsIfCorrect(string $input, bool $expected): void
    {
        $rule = new HasDoubleWithoutTriple();
        $this->assertSame($expected, $rule->isCorrect($input));
    }

    public function provideStringCases(): Generator
    {
        yield ['11222', true];
        yield ['4321', false];
        yield ['223450', true];
        yield ['2223450', false];
        yield ['1111', false];
        yield ['111122', true];
        yield ['11121', false];
        yield ['112', true];
        yield ['8811100', true];
        yield ['11112', false];
        yield ['112233', true];
        yield ['123444', false];
    }
}
