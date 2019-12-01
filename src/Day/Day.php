<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day;

/**
 * @psalm-immutable
 */
interface Day
{
    public function solveChallengeOne(string $input): string;

    public function solveChallengeTwo(string $input): string;

    public function getChallengeOneFile(): string;

    public function getChallengeTwoFile(): string;

    public function number(): string;
}
