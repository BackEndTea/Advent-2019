<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Test;

use BackEndTea\Advent\DayProvider;
use LogicException;
use PHPUnit\Framework\TestCase;

final class DayProviderTest extends TestCase
{
    public function testItProvidesDays(): void
    {
        $this->assertCount(4, DayProvider::provideDays());
    }

    public function testItCanProvideASingleDay(): void
    {
        DayProvider::provideDay(1);
        $this->addToAssertionCount(1);
    }

    public function testItErrorsOnWrongDay(): void
    {
        $this->expectException(LogicException::class);
        DayProvider::provideDay(0);
    }
}
