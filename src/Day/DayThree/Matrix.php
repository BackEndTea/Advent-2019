<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day\DayThree;

use LogicException;
use function abs;
use function array_map;
use function min;
use function range;
use function substr;

/**
 * @psalm-external-mutation-free
 */
class Matrix
{
    /** @var array<array<int>> */
    private $matrix = [[1]];

    /**
     * @var array<int>
     * @psalm-var array{0:int, 1:int}
     */
    private $current = [0, 0];

    /**
     * @var array<array<int>>
     * @psalm-var array<array{0:int, 1:int}>
     */
    private $hits = [];
    /** @var array<string> */
    private $inputOne;
    /** @var array<string> */
    private $inputTwo;

    /** @var int */
    private $moved = 0;

    /**
     * @var array<int>
     * @psalm-var array{0:int, 1:int}|array<int>
     */
    private $coordToCheck = [];

    /**
     * @param array<string> $inputOne
     * @param array<string> $inputTwo
     */
    public function __construct(array $inputOne, array $inputTwo)
    {
        foreach ($inputOne as $item) {
            $this->move($item[0], (int) substr($item, 1), 1);
        }

        $this->current = [0,0];
        foreach ($inputTwo as $item) {
            $this->move($item[0], (int) substr($item, 1), 2);
        }
        $this->current = [0, 0];

        $this->inputOne = $inputOne;
        $this->inputTwo = $inputTwo;
    }

    /**
     * @psalm-pure
     */
    public function solve(): string
    {
        return (string) min(...array_map(static function (array $coords): int {
            return abs($coords[0]) + abs($coords[1]);
        }, $this->hits));
    }

    /**
     * @psalm-external-mutation-free
     */
    public function solveTwo(): string
    {
        return (string) min(...array_map(function (array $coords): int {
            return $this->getDistanceTo($coords, $this->inputOne) +
                $this->getDistanceTo($coords, $this->inputTwo);
        }, $this->hits));
    }

    /**
     * @param array<int>    $coords
     * @param array<string> $input
     *
     * @psalm-param array{0:int, 1:int} $coords
     */
    private function getDistanceTo(array $coords, array $input): int
    {
        $this->current = [0, 0];
        $this->coordToCheck = $coords;
        $this->moved = 0;
        try {
            foreach ($input as $item) {
                $this->move($item[0], (int) substr($item, 1), 1);
            }
        } catch (MatrixFound $e) {
            return $e->tot;
        }

        return $this->moved;
    }

    private function move(string $direction, int $steps, int $wire): void
    {
        switch ($direction) {
            case 'R':
                $this->moveRight($steps, $wire);
                break;
            case 'L':
                $this->moveLeft($steps, $wire);
                break;
            case 'U':
                $this->moveUp($steps, $wire);
                break;
            case 'D':
                $this->moveDown($steps, $wire);
                break;
            default:
                throw new LogicException('unkown direction: ' . $direction);
        }
    }

    private function moveRight(int $steps, int $wire): void
    {
        [$startX, $startY] = $this->current;
        $endX = $startX + $steps;
        foreach (range($startX + 1, $endX) as $step) {
            $this->checkLocation($step, $startY, $wire);
        }

        $this->current = [$endX, $startY];
    }

    private function moveLeft(int $steps, int $wire): void
    {
        [$startX, $startY] = $this->current;
        $endX = $startX - $steps;
        foreach (range($startX - 1, $endX, -1) as $step) {
            $this->checkLocation($step, $startY, $wire);
        }

        $this->current = [$endX, $startY];
    }

    private function moveDown(int $steps, int $wire): void
    {
        [$startX, $startY] = $this->current;
        $endY = $startY - $steps;
        foreach (range($startY - 1, $endY, -1) as $step) {
            $this->checkLocation($startX, $step, $wire);
        }
        $this->current = [$startX, $endY];
    }

    private function moveUp(int $steps, int $wire): void
    {
        [$startX, $startY] = $this->current;
        $endY = $startY + $steps;
        foreach (range($startY + 1, $endY) as $step) {
            $this->checkLocation($startX, $step, $wire);
        }

        $this->current = [$startX, $endY];
    }

    protected function checkLocation(int $x, int $y, int $wire): void
    {
        $this->moved++;

        if ($this->coordToCheck === [$x, $y]) {
            throw new MatrixFound($this->moved);
        }
        if (! isset($this->matrix[$x][$y])) {
            $this->matrix[$x][$y] = $wire;

            return;
        }
        if ($this->matrix[$x][$y] === $wire) {
            return;
        }

        $this->hits[] = [$x, $y];
    }
}
