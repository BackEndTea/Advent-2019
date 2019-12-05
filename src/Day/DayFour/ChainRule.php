<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day\DayFour;

/**
 * @psalm-pure
 */
final class ChainRule implements Rule
{
    /**
     * @var array<Rule>
     * @psalm-var non-empty-list<Rule>
     */
    private $rules;

    /**
     * @param array<Rule> $rules
     *
     * @psalm-param non-empty-list<Rule> $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * @psalm-pure
     */
    public function isCorrect(string $in): bool
    {
        foreach ($this->rules as $rule) {
            if (! $rule->isCorrect($in)) {
                return false;
            }
        }

        return true;
    }
}
