<?php

declare(strict_types=1);

namespace BackEndTea\Advent\Day\DayThree;

use DomainException;

class MatrixFound extends DomainException
{
    /**
     * @var int
     * @readonly
     */
    public $tot;

    public function __construct(int $tot)
    {
        $this->tot = $tot;
        parent::__construct('');
    }
}
