<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Test;

use BackEndTea\Advent\Str;
use Generator;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    /**
     * @dataProvider provideLineNormalizationCases
     */
    public function testNormalizeLines(string $in, string $out): void
    {
        $this->assertSame($out, Str::normalizeLines($in));
    }

    public function provideLineNormalizationCases(): Generator
    {
        yield ['aasdf', 'aasdf'];
        yield ["aa\n", "aa\n"];
        yield ["aa\r", "aa\n"];
        yield ["aa\r\n", "aa\n"];
        yield ["aa\rbb\r\ncc\n\n", "aa\nbb\ncc\n\n"];
    }

    /**
     * @param array<int> $out
     *
     * @dataProvider provideToIntArrayCases
     */
    public function testConvertToIntegerArray(string $in, string $explode, array $out): void
    {
        $this->assertSame($out, Str::turnIntoIntegerArray($in, $explode));
    }

    public function provideToIntArrayCases(): Generator
    {
        yield ['12', "\n", [12]];
        yield ["10\n18\n", "\n", [10, 18]];
        yield ['1,1,1,2,90', ',', [1, 1, 1, 2, 90]];
        yield ['1,1,1,2,90,', ',', [1, 1, 1, 2, 90]];
    }
}
