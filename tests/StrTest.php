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
}
